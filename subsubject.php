<?php
    $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
    $mysqli->query("SET NAMES 'utf8'");
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
