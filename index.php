<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
		<?php
		    //Get grades
		    //Connection link to MySQL server
		    $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
		    //utf8 setting
		    $mysqli->query("SET NAMES 'utf8'");
		    //query
		    if($result = $mysqli->prepare('SELECT * FROM grade ORDER BY id'))
		    {
		        $result->execute();
		        $result->bind_result($id, $name, $description);
		        while($result->fetch())
		        {
		            printf("<a href=\"lesson.php?grade=%d\">%s</a> -- %s<br />", $id, $name, $description);
		        }
		        $result->close();
		    }
		    $mysqli->close();
		?>
    </body>
</html>
