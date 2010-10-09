<?php
    $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
    $mysqli->query("SET NAMES 'utf8'");
    if($stmt = $mysqli->prepare("SELECT id, name, description FROM lesson WHERE grade_id = ? ORDER BY id"))
    {
        $stmt->bind_param("i", $_GET['grade']);
        $stmt->execute();
        $stmt->bind_result($id, $name, $description);
        while($stmt->fetch())
        {
            printf("<a href=\"subject.php?lesson=%d\">%s</a> -- %s<br >", $id, $name, $description);
        }
        $stmt->close();
    }
    $mysqli->close();
?>
