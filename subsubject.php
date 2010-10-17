<?php 
	session_start();
	$_SESSION['subject'] = $_GET['subject'];
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
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name, subject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("iii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject']);
		        $stmt->execute();
		        $stmt->bind_result($grade, $lesson, $subject);
		        while($stmt->fetch())
		        {
		            echo $grade . ">" . $lesson . ">" . $subject . "<br />";
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
        ?>
		<?php
		    include "db.php";
			if($stmt = $mysqli->prepare("SELECT id, name, description FROM subsubject WHERE subject_id = ? ORDER BY id"))
		    {
		        $stmt->bind_param("i", $_GET['subject']);
		        $stmt->execute();
		        $stmt->bind_result($id, $name, $description);
		        while($stmt->fetch())
		        {
		            printf("%s -- %s (<a href=\"theory.php?subsubject=%d\">Онол</a> | <a href=\"game.php?subsubject=%d\">Дадлага</a> | <a href=\"test.php?subsubject=%d\">Сорил</a>)<br >", $name, $description, $id, $id, $id);
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
		?>
    </body>
</html>
