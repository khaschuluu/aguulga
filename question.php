<?php
	session_start();
	//Аль тэстээс дамжиж орж ирсэнийг хадгална.
	$_SESSION['test'] = $_GET['test'];

    if(!isset($_SESSION['stdscore']))
    {
        $_SESSION['stdscore'] = 0;
        $stdscore = $_SESSION['stdscore'];
    }
    if(!isset($_SESSION['qids']))
    {
        $_SESSION['qcursor'] = 0;
        $_SESSION['qids'] = array();
	   	include "db.php";
	    if($result = $mysqli->prepare('SELECT id FROM question WHERE test_id = ?'))
	    {
            $result->bind_param("i", $_GET['test']);
	        $result->execute();
	        $result->bind_result($qids);
	        while($result->fetch())
	        {
                array_push($_SESSION['qids'], $qids);
	        }
	        $result->close();
	    }
	    $mysqli->close();
    }
    else
    {
        if(isset($_POST['answer']))
        {
            include "db.php";
            if($result = $mysqli->prepare('SELECT istrue FROM answer WHERE question_id = ? AND id = ?'))
            {
                $result->bind_param("ii", $_SESSION['qids'][$_SESSION['qcursor']], $_POST['answer']);
                $result->execute();
                $result->bind_result($istrue);
                while($result->fetch())
                {
                    if($istrue == 1)
                    {
                        $_SESSION['stdscore'] = $_SESSION['stdscore'] + 10;
                        $stdscore = $_SESSION['stdscore'];
                        $correct = "Correct";
                    }
                    else
                    {
                        $_SESSION['stdscore'] = $_SESSION['stdscore'] - 1;
                        $stdscore = $_SESSION['stdscore'];
                        $correct = "Not correct";
                    }
                }
                $_SESSION['qcursor'] += 1;
                if($_SESSION['qids'][$_SESSION['qcursor']] == null)
                {
                    if(isset($_SESSION['qids'])) unset($_SESSION['qids']);
                    if(isset($_SESSION['qcursor'])) unset($_SESSION['qcursor']);
                    if(isset($_SESSION['stdscore'])) unset($_SESSION['stdscore']);
                }
                $result->close();
            }
            $mysqli->close();
        }
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link type="text/css" rel="stylesheet" href="css/blueprint/ie.css"/>
    	<link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
		<div class="container">
			<div class="span-24 header">
				<div class="span-3 header-img">
					<img src="img/aguulga_header.png" />
				</div><!--header-img-->
				<h1>Цахим агуулга</h1>
				<h2>Бага боловсролын цахим хичээлийн агуулга</h2>
			</div><!--header-->
			<div class="span-24 main">
				<div class="span-24 explore">
					<ul>
						<li class="first"><a href="index.php">Home</a></li>
        				<?php
							include "db.php";
						    if($stmt = $mysqli->prepare("SELECT grade.id, grade.name, lesson.id, lesson.name, subject.id, subject.name, subsubject.id, subsubject.name, test.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? INNER JOIN test ON test.id = ? WHERE lesson.id = ?"))
						    {
						        $stmt->bind_param("iiiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject'], $_SESSION['test']);
						        $stmt->execute();
						        $stmt->bind_result($grade_id, $grade_name, $lesson_id, $lesson_name, $subject_id, $subject_name, $subsubject_id, $subsubject_name, $test_name);
						        while($stmt->fetch())
						        {
									printf("<li><a href=\"lesson.php?grade=%d\">%s</a></li>", $grade_id, $grade_name);
						            printf("<li><a href=\"subject.php?lesson=%d\">%s</a></li>", $lesson_id, $lesson_name);
						            printf("<li><a href=\"subsubject.php?subject=%d\">%s</a></li>", $subject_id, $subject_name);
						            printf("<li><a href=\"#\">%s</a></li>", $subsubject_name);
						            printf("<li><a href=\"test.php?subsubject=%d\">%s</a></li>", $subsubject_id, $test_name);
						            printf("<li><a href=\"#\">Сорил явагдаж эхэллээ</a></li>");

						        }
						        $stmt->close();
						    }
						    $mysqli->close();
        				?>
					</ul>
				</div><!--explore-->

				<div class="span-24 list">
        			<form action="question.php?test=<?php echo $_GET['test'] ?>" method="post" name="send_answer">
					    <?php
        			        if(isset($_SESSION['qcursor']))
        			        {
					       	    include "db.php";
        			            if($result = $mysqli->prepare('SELECT question FROM question WHERE test_id = ? AND id = ?'))
        			            {
        			                $result->bind_param("ii", $_GET['test'], $_SESSION['qids'][$_SESSION['qcursor']]);
        			                $result->execute();
        			                $result->bind_result($question);
        			                while($result->fetch())
        			                {
        			                    echo $question . "<br />";
        			                }
        			                $result->close();
        			            }
					            if($result = $mysqli->prepare('SELECT id, answer FROM answer WHERE question_id = ?'))
					            {
        			                $result->bind_param("i", $_SESSION['qids'][$_SESSION['qcursor']]);
					                $result->execute();
					                $result->bind_result($answerid, $answer);
					                while($result->fetch())
					                {
					                    printf("<input type=\"radio\" name=\"answer\" value=\"%d\" />%s<br />", $answerid, $answer);
					                }
					                $result->close();
					            }
					            $mysqli->close();
        			            //session_destroy();
        			            echo "<input type=\"submit\" value=\"Оруулах\" />";
        			        }
        			        else
        			        {
        			            echo "<a href=\"test?subsubject=" . $_SESSION['subsubject'] . "\">Буцах</a>";
        			        }
					    ?>
        			</form>
        			<?php
        			    echo $correct . "<br />";
        			    echo "Оноо: " . $stdscore;
        			?>
				</div><!--list-->
			</div><!--main-->
		</div><!--container-->
		<div class="fooder">
			<p>This is fooder</p>
		</div><!--fooder-->
    </body>
</html>
