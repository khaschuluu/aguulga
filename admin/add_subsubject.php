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
        if(isset($_POST['subject_id']) && isset($_POST['subsubject_name']) && isset($_POST['subsubject_description']))
        {
            include "../db.php";
			if($stmt = $mysqli->prepare("INSERT INTO subsubject(subject_id, name, description) values(?, ?, ?)"))
            {
                $stmt->bind_param("iss",$_POST['subject_id'], $_POST['subsubject_name'], $_POST['subsubject_description']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " дэд сэдэв нэмэгдлээ.";
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
        <form action="add_subsubject.php" method="post" name="add_subsubject">
            Хичээл:
            <select name="subject_id">
            <?php
                include "../db.php";
				$query = "SELECT subject.id, grade.name, lesson.name, subject.name FROM subject INNER JOIN lesson ON lesson.id = subject.lesson_id INNER JOIN grade ON grade.id = lesson.grade_id ORDER BY subject.id";
                if($result = $mysqli->prepare($query))
                {
                    $result->execute();
                    $result->bind_result($subject_id, $grade_name, $lesson_name, $subject_name);
                    while($result->fetch())
                    {
                        printf("<option value=\"%d\">%s %s %s</option>", $subject_id, $grade_name, $lesson_name, $subject_name);
                    }
                    $result->close();
                }
                $mysqli->close();

            ?>
            </select><br />
            Дэд сэдвийн нэр:
            <input type="text" name="subsubject_name" /><br />
            Дэд сэдвийн тайлбар:
            <input type="text" name="subsubject_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="index.php">Буцах</a> | <a href="../index.php">Нүүр</a>
    </body>
</html>
