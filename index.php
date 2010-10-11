<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    	<link type="text/css" rel="stylesheet" href="css/blueprint/ie.css"/>
    	<link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
	</head>
    <body>
		<?php
			//За доорх хэсгийг сайн харж аваарай. Бүх дуудах хэсгүүд иймэрхүү маягаар ажиллах учир би дараа дараагийн хуудсууд дээр тайлбар хийхгүй.

		    //Ангиудыг гаргаж харуулах хэсэг.
			//Хамгийн түрүүлж ангиудыг харуулах тул энэ хэсгийг index тавьчихлаа.
		    //Баазруугаа холбогдох гэж байна.
			//Баазруугаа холбогдох файлыг дуудаж байна.
		   	include "db.php";
		    //Ангиудын бүх багануудыг дуудах query бичиж байна.
		    if($result = $mysqli->prepare('SELECT * FROM grade ORDER BY id'))
		    {
				//Дээр бичсэн query-гээ ажиллуулах.
		        $result->execute();
				//Харин одоо дээр ажиллуулаад хүрж ирсэн өгөгдлүүдийг PHP хувьсагчид оноож байна.
				//Array буюу массив маягаар баганын олон өгөгдлүүд оноогдоно.
		        $result->bind_result($id, $name, $description);
				//Одоо утгуудыгаа мөр мөрөөр нь дуустал нь давтана.
		        while($result->fetch())
		        {
					//Энд салгаж авсан өгөгдлүүдээ HTML болгож рендэрлэж байна.
					//Echo функц ашигласан ч болно.
					//lesson.php нь ирсэн grade хувьсагчийн утгаар grade_id гэдэг хүснэгтээр шүүж харуулдаг.
					//Тийм учираас доорх линкийг lesson.php хуудасруу grade гэдэг хувьсагчид grade-ийн id-г оноогоод зааж байна.
					//Харин текст дээр нь тухайн ангийн дэлгэрэнгүй мэдээлэл гарах болно.
		            printf("<a href=\"lesson.php?grade=%d\">%s</a> -- %s<br />", $id, $name, $description);
		        }
				//Бичсэн query-гээ хүчингүй болгож байна.
		        $result->close();
		    }
			//Нээсэн баазаасаа холболт таслаж байна. Зайлшгүй ийм байх ёстой үгүйг мэдэхгүй ч ингэх нь дээр.
		    $mysqli->close();
		?>
    </body>
</html>
