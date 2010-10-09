<?php
    $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
    $mysqli->query("SET NAMES 'utf8'");
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
