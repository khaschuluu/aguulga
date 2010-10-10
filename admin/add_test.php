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
        if(isset($_POST['subsubject_id']) && isset($_POST['test_name']) && isset($_POST['test_description']))
        {
            include "../db.php";
			if($stmt = $mysqli->prepare("INSERT INTO test(subsubject_id, name, description) values(?, ?, ?)"))
            {
                $stmt->bind_param("iss",$_POST['subsubject_id'], $_POST['test_name'], $_POST['test_description']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " тэст нэмэгдлээ.";
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
        <form action="add_test.php" method="post" name="add_test">
            Дэд сэдэв:
            <select name="subsubject_id">
            <?php
                include "../db.php";
				$query = "SELECT subsubject.id, grade.description, lesson.name, subject.name, subsubject.name FROM subsubject INNER JOIN subject ON subject.id = subsubject.subject_id INNER JOIN lesson ON lesson.id = subject.lesson_id INNER JOIN grade ON grade.id = lesson.grade_id ORDER BY subsubject.id";
                if($result = $mysqli->prepare($query))
                {
                    $result->execute();
                    $result->bind_result($subsubject_id, $grade_description, $lesson_name, $subject_name, $subsubject_name);
                    while($result->fetch())
                    {
                        printf("<option value=\"%d\">%s - %s - %s - %s</option>", $subsubject_id, $grade_description, $lesson_name, $subject_name, $subsubject_name);
                    }
                    $result->close();
                }
                $mysqli->close();

            ?>
            </select><br />
            Тэст нэр:
            <input type="text" name="test_name" /><br />
            Тэст тайлбар:
            <input type="text" name="test_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="index.php">Буцах</a> | <a href="../index.php">Нүүр</a>
    </body>
</html>
