<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
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
    </body>
</html>
