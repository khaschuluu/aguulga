<?php
	//Энэ бол зүгээр л зохицуулах код. Ямар нэгэн үр дүн хэвлэхгүй.
	//Эхлээд admin session байгаа үгүйг шалгана. Мэдээж нэвтрээгүй хэрэглэгч гарна гэж үгүй учир шууд login.php-рүү.
	//Дараа нь зөвхөн энэ хуудасруу logout гэдэг утга ирсэн үү гэдгийг шалгаад
	//ирсэн бол admin session-ыг устгаад login.php-рүү буцаана.
	//Харин ирээгүй байвал хуурамч хүсэлт гээд шууд admin/index.php-рүү чиглүүлнэ.
	session_start();
	global $error;
	if(isset($_SESSION['admin']))
	{
		if(isset($_POST['logout']))
		{
			unset($_SESSION['admin']);
			header("Location: login.php");
		}
		else
		{
			header("Location: index.php");
		}
	}
	else
	{
		$error = "Та нэвтэрч орно уу!";
		header("Location: login.php");
	}
?>
