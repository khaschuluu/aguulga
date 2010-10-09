<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
		<?php
		    $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
		    $mysqli->query("SET NAMES 'utf8'");
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
