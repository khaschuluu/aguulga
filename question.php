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
                        $correct = "Зөв байна";
                    }
                    else
                    {
                        $_SESSION['stdscore'] = $_SESSION['stdscore'] - 1;
                        $stdscore = $_SESSION['stdscore'];
                        $correct = "Буруу байна";
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
		else
		{
        	$_SESSION['stdscore'] = $_SESSION['stdscore'] + 0;
        	$stdscore = $_SESSION['stdscore'];
        	$correct = "Хариулт байхгүй";
                    
			$_SESSION['qcursor'] += 1;
           	if($_SESSION['qids'][$_SESSION['qcursor']] == null)
           	{
           	    if(isset($_SESSION['qids'])) unset($_SESSION['qids']);
           	    if(isset($_SESSION['qcursor'])) unset($_SESSION['qcursor']);
           	    if(isset($_SESSION['stdscore'])) unset($_SESSION['stdscore']);
           	}

		}
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link type="text/css" rel="stylesheet" href="css/css.css"/>
    	  <link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
    </head>
    <body class="background">
        <?php
			include "db.php";
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name, subject.name, subsubject.name, test.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? INNER JOIN test ON test.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("iiiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject'], $_SESSION['test']);
		        $stmt->execute(); 
		        $stmt->bind_result($grade, $lesson, $subject, $subsubject, $test);
		        while($stmt->fetch())
		        {
		           // echo $grade . ">" . $lesson . ">" . $subject . ">" . $subsubject . ">" . $test . "<br />";
		        }
		        $stmt->close(); 
		    }
		    $mysqli->close();
        ?>
        
        
        <!-- Contaner begin --> 
<div class="container">
		<!--menu begin-->
    <a href="index.php"><div class="class2"></div></a>
        <!--menu end-->
        <div class="class2_header"></div>
        <div class="test">
        	<div class="onol_link">
        	   <a href="theory.php?subsubject=<?php echo $_SESSION['subsubject']; ?>"><h6>Онол</h6></a></div> 
            <div class="onol_link"><a href="game.php?subsubject=<?php echo $_SESSION['subsubject']; ?>"><h6>Дадлага</h6></a></div>
            <div class="onol_link"><a href="test.php?subsubject=<?php echo $_SESSION['subsubject'] ?>"><h5>Тест</h5></a></div>
         </div>
	
             <!--main begin-->
			<div class="span-24 main"> 
				<!-- Header begin -->
    			<div class="span-24 header_background">
             		</div>
    			<!-- Header end -->
            	<!-- main white begin -->
            	<div class="span-23 main_white"> 
              		<!-- left_home_page begin -->
                    <div class="span-7 left_home_page">
                    	<div class="title"><h7><?php echo $correct . "<br />";
      												  echo "Оноо: " . $stdscore; ?></h7></div>
                		<a href="index.php"><div class="back"></div></a>
                        <div class="ropot"></div>
                	</div>
                    <!-- left_home_page end --> 
                	<!-- right_home_page begin -->
                    <div class="span-15 right_home_page1">
                    	<div class="onol_youtube">
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
                            echo "<div class='test_title'>".$question . "</div>";
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
                    echo "<a href=\"test.php?subsubject=" . $_SESSION['subsubject'] . "\">Буцах</a>";
                }
		    ?>
        </form> 
                        
                        
                      </div>
                    
                		</div>
                <!-- rigth_home_right end --> 
            </div>
             <!-- main white end -->
		</div>

	</div>
<!-- main end-->

</div>
<!-- Container end-->
<div class="footer" align="center">
			<div class="footer1">
    			<a href="#"><div class="footer2"></div></a>
        <div class="footer3" align="left">
        	<div class="footer3_txt"><h9>Та бүхэн манай вэбийг <a href="#">firefox</a> дээр үзвэл илүү гоё шүү!</h9></div>
            <div class="footer3_txt1"><h9>ХҮҮХЭД БҮРТ КОМПЬЮТЭР ХӨТӨЛБӨР ХЭРЭГЖҮҮЛЭХ НЭГЖ</h9></div>
        </div>
        <a href="#"><div class="footer4"></div></a>
    </div>
</div>
    </body>
</html>
