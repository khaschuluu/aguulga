<?php
    session_start();
    global $error;
	//Хэрвээ энэ хуудасруу аль хэдийн нэвтэрчихсэн админ хандвал шууд admin/index.php хуудасруу чиглүүлнэ.
	//Дахин дахин нэвтрэхгүй шүү дээ.
	//Ингэхийн тулд admin нэртэй session байна уу үгүй юу гэдгийг шалгаад, байхгүй бол нэвтрэх үйлдэлийг үргэлжүүлнэ.
    if(isset($_SESSION['admin']))
    {
        header("Location: index.php");
    }
    else
    {
		//Энэ хуудсанд username болон password гэсэн утгууд дамжигдаж ирсэн үгүйг шалгаж байна.
		//Хэрвээ тийм үгүй бол шууд доорх HTML хуудсыг хэвлэх буюу таны нэвтрээгүй байна гэж үзээд нэр нууц үгийг асаан.
		//Харин доорх хувьсагчууд дамжигдаж ирсэн бол шалгаад, нэвтрүүлэх үгүйг шийднэ.
        if(isset($_POST['username']) && isset($_POST['password']))
        {
			//Энэ жаахан онцгүй шийдсэн арга. Үүнийг дараа нь баазтай холбочихно.
            $name = "admin";
            $pass = "admin";
			//За доор хэрэглэгчийн бөглөсөн нэр нууц үг нь жинхэнэ нэр нууц үгтэй тохирч байгааг шалгаад
			//тохирч байвал admin session үүсгээд эргүүлээд энэ хуудсыг ачаална.
			//Учир нь энэ хуудас дээр admin session байгаа үгүйг шалгаад admin/index.php-рүү заахыг санаж байгаа байх.
			//Яагаад ингэж давхар дуудсан бэ гэхээр, мэдэхгүймаа, шууд зааж болно л доо, мань хашиг загвартаж л байх шиг байна :P
            if($name == $_POST['username'] && $pass == $_POST['password'])
            {
                $_SESSION['admin'] = $_POST['username'];
                header("Location: login.php");
            }
			//Харин дээрх нөхцөл худал буюу нэр нууц үг зөрвөл мэдээж алдааны мэдээллийг энэ хуудасруу дахин дамжуулаад, дахиж ачаална.
			//Нэг ёсондоо худлаа өгөгдөл оруулаад л байх юм бол алдааны мэдээлэл гарч ирээд л энэ хуудас дахин дахин ачаалагдаад банйа гэсэн үг.
            else
            {
                $error = "Хэрэглэгчийн нэр, эсвэл нууц үг буруу байна.";
                header("Locatoin: login.php");
            }
        }
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
		<?php
			//Дээр их сонин, шууд хаанаас орж ирсэн нь мэдэгдэхгүй нөхцөл шалгаад байгааг харж байна уу?
			//Доор байгаа форм нь админы хэрэгцээт мэдээллүүдийг аваад эргүүлээд энэ хуудасруу дамжуулна.
			//Тэгээд манайхуудас дахин ачаалахдаа дээр байгаа кодоороо энэ утгуудыг барьж аваад нэвтрүүлэх үгүйг шийдэх авай.
		?>
        <form action="login.php" method="post" name="logform">
            Username:
            <input type='text' name="username" /><br />
            Password:
            <input type='password' name="password" /><br />
            <input type='submit' value="Нэвтрэх" />
        </form>
        <?php
			//Энэ нөгөө дээр оноогоод байгаа алдааны мэдээллийг хэвлэж байна.
			//echo ашиглаж болно л доо.
			//Тэгээд аль ч хуудаснаас ирсэн алдааны мэдээллийг энд хэвлэнэ. Учир нь энэ global хувьсагч.
            printf("%s", $error);
        ?>
    </body>
</html>
