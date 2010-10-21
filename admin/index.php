<?php
	//Энд админы баталгаажуулалт буюу autontication гэдэг асуудлыг алдарт session-оор шийдсэн байгаа.
	//Доор session ашиглана гэдгээ зааж байна.
	session_start();
	//Доорх хувьсагч нь хандах эрхээр хязгаарласан хуудсууд дунд хандах эрхийн алдаа гарвал дамжуулна.
	global $error;
	//Хэрвээ admin гэдэг session үүсээгүй байвал бид нэвтэрч орох хэрэгтэй.
	//Шууд login.php-рүү заахдаа error-д алдааны мэдээллийг өгч байна.
	//Хэрвээ доорх нөхцөл үнэн бол login.php хуудас доорх мэссэжтэй дуудагдах болно.
	//Ихэнх хуудсууд дээр иймэрхүү буюу хандах эрх байхгүй бол шууд login хуудасруу зааснаар хандах эрхийг зохицуулсан.
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
		<?php
			//Энэ форм бол logout.php хуудасруу logout утга дамжуулсанаар гарна, session устгаж байгаа.
			//logout.php хуудсыг харна уу!
		?>
		<form action="logout.php" method="post" name="logout">
		    <input type='submit' name="logout" value="Гарах" />
		</form>
		<a href="add_grade.php">Анги нэмэх</a><br />
		<a href="add_lesson.php">Хичээл нэмэх</a><br />
		<a href="add_subject.php">Сэдэв нэмэх</a><br />
		<a href="add_subsubject.php">Дэд сэдэв нэмэх</a><br />
		<a href="add_theory.php">Онол нэмэх</a><br />
		<a href="add_game.php">Дадлага нэмэх</a><br />
		<a href="add_test.php">Тэст нэмэх</a><br />
		<a href="add_question.php">Асуулт нэмэх</a>
    </body>
</html>
