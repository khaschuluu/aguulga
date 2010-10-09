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
        if(isset($_POST['grade_name']) && isset($_POST['grade_description']))
        {
            $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
            $mysqli->query("SET NAMES 'utf8'");
            if($stmt = $mysqli->prepare("INSERT INTO grade(name, description) values(?, ?)"))
            {
                $stmt->bind_param("ss", $_POST['grade_name'], $_POST['grade_description']);
                $stmt->execute();
                printf("%d aнги нэмэгдлээ.<br />", $stmt->affected_rows);
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
        <form action="add_grade.php" method="post" name="add_grade">
            Ангийн нэр:
            <input type="text" name="grade_name" /><br />
            Тайлбар:
            <input type="text" name="grade_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="admin.php">Буцах</a> | <a href="index.php">Нүүр</a>
    </body>
</html>
