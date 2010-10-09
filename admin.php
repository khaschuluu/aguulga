<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
		<?php
		    session_start();
		    global $error;
		    if(isset($_SESSION['admin']))
		    {
		        if(isset($_POST['logout']))
		        {
		            unset($_SESSION['admin']);
		            header("Location: login.php");
		        }
		    }
		    else
		    {
		        $error = "Та нэвтэрч орно уу!";
		        header("Location: login.php");
		    }
		?>
		<form action="admin.php" method="post" name="logout">
		    <input type='submit' name="logout" value="Гарах" />
		</form>
		<a href="add_grade.php">Анги нэмэх</a><br />
		<a href="add_lesson.php">Хичээл нэмэх</a><br />
		<a href="add_subject.php">Сэдэв нэмэх</a><br />
		<a href="add_subsubject.php">Дэд сэдэв нэмэх</a>
    </body>
</html>
