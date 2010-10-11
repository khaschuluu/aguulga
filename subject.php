<?php 
	session_start();
	echo 'Cэдэв дээр үүссэн сэшн '.$_SESSION['grade'].'<br />';
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
