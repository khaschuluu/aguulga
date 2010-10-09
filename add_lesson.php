<?php
    session_start();
    global $error;
    if(!isset($_SESSION['admin']))
    {
        $error = "Та нэвтэрч орно уу!";
        header("Location: login.php");
    }
    else
    {
        if(isset($_POST['grade_id']) && isset($_POST['lesson_name']) && isset($_POST['lesson_description']))
        {
            $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
            $mysqli->query("SET NAMES 'utf8'");
            if($stmt = $mysqli->prepare("INSERT INTO lesson(grade_id, name, description) values(?, ?, ?)"))
            {
                $stmt->bind_param("iss",$_POST['grade_id'], $_POST['lesson_name'], $_POST['lesson_description']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " хичээл нэмэгдлээ.";
                $stmt->close();
            }
            $mysqli->close();
        }
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
        <?php
            if($notice != null)
                echo $notice . "<br />";
        ?>
        <form action="add_lesson.php" method="post" name="add_grade">
            Анги:
            <select name="grade_id">
            <?php
                $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
                $mysqli->query("SET NAMES 'utf8'");
                if($result = $mysqli->prepare('SELECT id, description FROM grade ORDER BY id'))
                {
                    $result->execute();
                    $result->bind_result($grade_id, $grade_description);
                    while($result->fetch())
                    {
                        printf("<option value=\"%d\">%s</option>", $grade_id, $grade_description);
                    }
                    $result->close();
                }
                $mysqli->close();

            ?>
            </select><br />
            Хичээлийн нэр:
            <input type="text" name="lesson_name" /><br />
            Хичээлийн тайлбар:
            <input type="text" name="lesson_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="admin.php">Буцах</a> | <a href="index.php">Нүүр</a>
    </body>
</html>
