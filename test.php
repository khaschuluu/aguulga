<?php 
	session_start();
	$_SESSION['subsubject'] = $_GET['subsubject'];
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
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name, subject.name, subsubject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("iiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject']);
		        $stmt->execute();
		        $stmt->bind_result($grade, $lesson, $subject, $subsubject);
		        while($stmt->fetch())
		        {
		            echo $grade . ">" . $lesson . ">" . $subject . ">" . $subsubject . "<br />";
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
