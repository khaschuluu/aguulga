<?php 
	session_start();
	$_SESSION['grade'] = $_GET['grade'];
	//Шалгалтанд зориулж үүсгэсэн session-уудыг устгаж байна.
   	if(isset($_SESSION['qids'])) unset($_SESSION['qids']);
   	if(isset($_SESSION['qcursor'])) unset($_SESSION['qcursor']);
   	if(isset($_SESSION['stdscore'])) unset($_SESSION['stdscore']);

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
				<div class="span-3 header-img">
					<img src="img/aguulga_header.png" />
				</div><!--header-img-->
				<h1>Цахим агуулга</h1>
				<h2>Бага боловсролын цахим хичээлийн агуулга</h2>
			</div><!--header-->
			<div class="span-24 main">
				<div class="span-24 explore">
					<ul>
						<li class="first"><a href="index.php">Home</a></li>
        				<?php
							include "db.php";
						    if($stmt = $mysqli->prepare("SELECT id, name FROM grade WHERE id = ?"))
						    {
						        $stmt->bind_param("i", $_SESSION['grade']);
						        $stmt->execute();
						        $stmt->bind_result($grade_id, $grade_name);
						        while($stmt->fetch())
						        {
						            printf("<li><a href=\"lesson.php?grade=%d\">%s</a></li>", $grade_id, $grade_name);
						            printf("<li><a href=\"#\">Хичээлүүд</a></li>");
						        }
						        $stmt->close();
						    }
						    $mysqli->close();
        				?>
					</ul>
				</div><!--explore-->

				<div class="span-24 list">
					<ul>
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
						            printf("<li><a href=\"subject.php?lesson=%d\">%s</a><br /><p>%s</p></li>", $id, $name, $description);
						        }
						        $stmt->close();
						    }
						    $mysqli->close();
						?>
					</ul>
				</div><!--list-->
			</div><!--main-->
		</div><!--content-->
		<div class="fooder">
			<p>This is fooder</p>
		</div><!--fooder-->
    </body>
</html>
