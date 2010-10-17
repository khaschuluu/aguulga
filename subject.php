<?php 
	session_start();
	$_SESSION['lesson'] = $_GET['lesson'];
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
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name FROM lesson INNER JOIN grade ON grade.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("ii", $_SESSION['grade'], $_SESSION['lesson']);
		        $stmt->execute();
		        $stmt->bind_result($grade, $lesson);
		        while($stmt->fetch())
		        {
		            echo $grade . ">" . $lesson . "<br />";
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
        ?>
		<?php
		    include "db.php";
			if($stmt = $mysqli->prepare("SELECT id, name, description FROM subject WHERE lesson_id = ? ORDER BY id"))
		    {
		        $stmt->bind_param("i", $_GET['lesson']);
		        $stmt->execute();
		        $stmt->bind_result($id, $name, $description);
		        while($stmt->fetch())
		        {
		            printf("<a href=\"subsubject.php?subject=%d\">%s</a> -- %s<br >", $id, $name, $description);
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
		?>
    </body>
</html>
