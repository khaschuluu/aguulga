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
        if(isset($_POST['subsubject_id']) && isset($_POST['theory_description']))
        {
            include "../db.php";
			if($stmt = $mysqli->prepare("INSERT INTO theory(subsubject_id, description) values(?, ?)"))
            {
                $stmt->bind_param("is",$_POST['subsubject_id'], $_POST['theory_description']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " дадлагa нэмэгдлээ.";
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
        <form action="add_theory.php" method="post" name="add_theory">
            Хичээл:
            <select name="subsubject_id">
            <?php
                include "../db.php";
				$query = "SELECT subsubject.id, grade.name, lesson.name, subject.name, subsubject.name FROM subsubject INNER JOIN subject ON subject.id = subsubject.subject_id INNER JOIN lesson ON lesson.id = subject.lesson_id INNER JOIN grade ON grade.id = lesson.grade_id ORDER BY subject.id";
                if($result = $mysqli->prepare($query))
                {
                    $result->execute();
                    $result->bind_result($subsubject_id, $grade_name, $lesson_name, $subject_name, $subsubject_name);
                    while($result->fetch())
                    {
                        printf("<option value=\"%d\">%s %s %s %s</option>", $subsubject_id, $grade_name, $lesson_name, $subject_name, $subsubjet_name);
                    }
                    $result->close();
                }
                $mysqli->close();

            ?>
            </select><br />
            Онол:
            <input type="text" name="theory_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="index.php">Буцах</a> | <a href="../index.php">Нүүр</a>
    </body>
</html>
