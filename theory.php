<?php 
	session_start();
	$_SESSION['subsubject'] = $_GET['subsubject'];
	//Шалгалтанд зориулж үүсгэсэн session-уудыг устгаж байна.
   	if(isset($_SESSION['qids'])) unset($_SESSION['qids']);
   	if(isset($_SESSION['qcursor'])) unset($_SESSION['qcursor']);
   	if(isset($_SESSION['stdscore'])) unset($_SESSION['stdscore']);

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
						    if($stmt = $mysqli->prepare("SELECT grade.id, grade.name, lesson.id, lesson.name, subject.id, subject.name, subsubject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? WHERE lesson.id = ?"))
						    {
						        $stmt->bind_param("iiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject']);
						        $stmt->execute();
						        $stmt->bind_result($grade_id, $grade_name, $lesson_id, $lesson_name, $subject_id, $subject_name, $subsubject_name);
						        while($stmt->fetch())
						        {
									printf("<li><a href=\"lesson.php?grade=%d\">%s</a></li>", $grade_id, $grade_name);
						            printf("<li><a href=\"subject.php?lesson=%d\">%s</a></li>", $lesson_id, $lesson_name);
						            printf("<li><a href=\"subsubject.php?subject=%d\">%s</a></li>", $subject_id, $subject_name);
						            printf("<li><a href=\"#\">%s</a></li>", $subsubject_name);
						            printf("<li><a href=\"#\">Онол</a></li>", $subsubject_id, $subsubject_name);
						        }
						        $stmt->close();
						    }
						    $mysqli->close();
        				?>
					</ul>
				</div><!--explore-->

				<div class="span-24 list">
					<center>
						<?php
						    include "db.php";
							if($stmt = $mysqli->prepare("SELECT description FROM theory WHERE subsubject_id = ?"))
						    {
						        $stmt->bind_param("i", $_GET['subsubject']);
						        $stmt->execute();
						        $stmt->bind_result($description);
						        while($stmt->fetch())
						        {
						            printf("%s", $description);
						        }
						        $stmt->close();
						    }
						    $mysqli->close();
						?>
					</center>
				</div><!--list-->
			</div><!--main-->
		</div><!--container-->
		<div class="fooder">
			<p>This is fooder</p>
		</div><!--fooder-->
    </body>
</html>
