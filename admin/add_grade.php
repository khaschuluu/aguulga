<?php
	//Add гэсэн хэсгүүд бол ямар нэгэн утга баазруу нэмэх үйлдлүүдийг хийнэ.
	//Ерөнхийдөө баазаас дуудах үйлдэлтэй адил тул ойлгоход их энгийн.
	//Доорх кодыг сайн харж аваарай, бусад бүх оруулах хэсгүүдэд давтагдана.

	//Мэдээж хамгийн түрүүнд админ мөн эсэхийг шалгаад, биш бол login.php-рүү чиглүүлнэ.
    session_start();
    global $error;
    if(!isset($_SESSION['admin']))
    {
        $error = "Та нэвтэрч орно уу!";
        header("Location: login.php");
    }
	//Админ мөн бол энэ хуудасруу grade_name болон grade_description гэсэн хүсэлт ирсэн тухай шалгана.
	//Энэ нь яг login хэсэг шиг эхлээд php-гээр хүсэлтүүдээ шалгаад, байвал зохих үйлдлүүдийг (баазруу мэдээлэл оруулах) хийгээд дахин асуудаг.
	//Нэг ёсондоо өөрөө өөртөө мэдээлэл дамжуулж, өөрөө өрийгөө боловсруулдаг гэсэн үг.
	//Тийм ч учираас файлын толгойд нь ийм эсэн бүрийн php код яваад байгаа юм.
    else
    {
        if(isset($_POST['grade_name']) && isset($_POST['grade_description']))
        {
			//Дээрх хүсэлтүүд ирсэн бол баазтайгаа холбогдох ажлаа хийж байна. Энийг бид мэднэ.
			include "../db.php";
			//Доор нөгөө prepared statment гээчийгээ query-тэй бичиж байна. Асуултын тэмдэгийн оронд юм рэндэрлэгдэнэ.
            if($stmt = $mysqli->prepare("INSERT INTO grade(name, description) values(?, ?)"))
            {
				//Дээр query дотор байгаа хоёр ? тэмдэгт харгалзуулын ирсэн хүсэлтийг оноож байна.
                $stmt->bind_param("ss", $_POST['grade_name'], $_POST['grade_description']);
				//Одоо ажиллуулна. Ингэснээр дотор нь манай хүсэлт харгалзан рэндэрлэгдсэн query ажиллаж баазруу бидний бөглөсөн мэдээлэл орно.
                $stmt->execute();
				//Хэрвээ query маань зөв ажилласан бол доорх хувьсагчид утга өгсөнөөр энэ нь доор HTML дотор очоод үүнийг зохих газар нь хэвлэнэ.
                $notice = $stmt->affected_rows . " aнги нэмэгдлээ.<br />";
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
			{
				echo $notece;
			}
		?>
		<?php
			//Цааших бүх нэмэх хэсгүүд ийм архитектураар ажиллана.
			//Доор байгаа форм нь энэ хуудасруу шинэ ангийн мэдээллүүдийг өгнө.
			//Энэ хуудасруу бөглөсөн мэдээллүүдийг дахин дамжуулсанаар дээр зохих боловсруулалтыг хийнэ.
		?>
        <form action="add_grade.php" method="post" name="add_grade">
            Ангийн нэр:
            <input type="text" name="grade_name" /><br />
            Тайлбар:
            <input type="text" name="grade_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="index.php">Буцах</a> | <a href="../index.php">Нүүр</a>
    </body>
</html>
