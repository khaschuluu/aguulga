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
	</head>
    <body>
        <?php
			include "db.php";
		    if($stmt = $mysqli->prepare("SELECT grade.id, grade.description, lesson.id, lesson.name, subject.id, subject.name, subsubject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("iiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject']);
		        $stmt->execute();
		        $stmt->bind_result($grade_id, $grade_description, $lesson_id, $lesson_description, $subject_id, $subject_description, $subsubject_description);
		        while($stmt->fetch())
		        {
						echo "<a href=\"lesson.php?grade=" . $grade_id . "\">" . $grade_description . "</a> > <a href=\"subject.php?lesson=" . $lesson_id . "\">" . $lesson_description . "</a> > <a href=\"subsubject.php?subject=" . $subject_id . "\">" . $subject_description . "</a> > " . $subsubject_description . "<br />";
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
        ?>

		<?php
		    include "db.php";
			if($stmt = $mysqli->prepare("SELECT * FROM test WHERE subsubject_id = ? ORDER BY id"))
		    {
		        $stmt->bind_param("i", $_GET['subsubject']);
		        $stmt->execute();
		        $stmt->bind_result($id, $subsubject_id, $name, $description);
		        while($stmt->fetch())
		        {
		            printf("<a href=\"question.php?test=%d\">%s</a> -- %s<br />", $id, $name, $description);
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
		?>
    </body>
</html>
