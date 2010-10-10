<?php
	session_start();
	global $error;
	if(!isset($_SESSION['admin']))
	{
		$error = "Та нэвтэрч орно уу!";
		header("Location: login.php");
	}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
		<form action="logout.php" method="post" name="logout">
		    <input type='submit' name="logout" value="Гарах" />
		</form>
		<a href="add_grade.php">Анги нэмэх</a><br />
		<a href="add_lesson.php">Хичээл нэмэх</a><br />
		<a href="add_subject.php">Сэдэв нэмэх</a><br />
		<a href="add_subsubject.php">Дэд сэдэв нэмэх</a><br />
		<a href="add_test.php">Тэст нэмэх</a><br />
		<a href="add_question.php">Асуулт нэмэх</a>
    </body>
</html>
