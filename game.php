<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
		<?php
		    $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
		    $mysqli->query("SET NAMES 'utf8'");
		    if($stmt = $mysqli->prepare("SELECT description FROM game WHERE subsubject_id = ?"))
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
    </body>
</html>
