<?php 
	session_start();
	$_SESSION['grade'] = $_GET['grade'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link type="text/css" rel="stylesheet" href="css/blueprint/ie.css"/>
    	<link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
	<div class="container">
			<div class="span-24 header">
				<img src="img/aguulga_header.png" />
				<font size="7" color="green">Цахим агуулга</font>
			</div>
			<div class="span-24 main">
				<ul>
        			<?php
						include "db.php";
					    if($stmt = $mysqli->prepare("SELECT description FROM grade WHERE id = ?"))
					    {
					        $stmt->bind_param("i", $_SESSION['grade']);
					        $stmt->execute();
					        $stmt->bind_result($grade);
					        while($stmt->fetch())
					        {
					            echo $grade . "<br />";
					        }
					        $stmt->close();
					    }
					    $mysqli->close();
        			?>
					<?php
						//Хичээлүүдийг дуудаж харуулах хэсэг.
						include "db.php";
						//Одоо доор бичих хэдэн тайлбарууд бас л бусад дуудах хуудсууд дээр тавтагдана.
						//Сайн харж аваарай, энэ нь өмнөх хуудаснаас ирсэн өгөгдлийг барьж аваад тэрүүгээрээ шүүлт хийх эд байгаа юм.
						//Доор анги дуудаж байгаагаас нэг ялгаатай юм байгаа нь тэр асуултын ? тэмдэг.
						//Тэр ? тэмдэгийн байрлалыг сайн хараарай, учир нь тэнд дараа нь нэг тоо рендэрлэгдэнэ.
						//Яагав нөгөө ангиас ирж байгаа grade-ийн id ;)
					    if($stmt = $mysqli->prepare("SELECT id, name, description FROM lesson WHERE grade_id = ? ORDER BY id"))
					    {
							//Дээр байсан ? тэмдэгийн ид шид энд гарч ирнэ.
							//Гэхдээ зүгээр шууд яагаад string дээр нь рэндэрлэчихэж яагаад болоогүй юм гэж үү?
							//Учир нь бид prepared statment гэдэг mysql-ийн маш том давуу талыг дээр ашиглаж байгаа юм.
							//За одоо асуултын тэмдэгийн оронд юу байхыг доор зааж өгнө.
							//i гэдэг нь integer тоо байна гэдгийг, тэгээд тэр тоо нь өмнөх хуудсаас ирсэн grade гэдэг хувьсагч байна гэдгийг зааж байна.
							//Өмнөх хуудаснаас ангийн id орж ирээд энд хичээлүүдийг ангийн id-гаар нь шүүж байгаа юм.
					        $stmt->bind_param("i", $_GET['grade']);
					        $stmt->execute();
					        $stmt->bind_result($id, $name, $description);
					        while($stmt->fetch())
					        {
					            printf("<li><a href=\"subject.php?lesson=%d\">%s</a><br /><font size=\"3\">%s</font></li>", $id, $name, $description);
					        }
					        $stmt->close();
					    }
					    $mysqli->close();
					?>
				</ul>
			</div>
		</div>
    </body>
</html>
