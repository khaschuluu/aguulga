<html>
    <head>
<<<<<<< HEAD
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
						<li><a href="#">Нүүр хуудас</a></li>
					</ul>
				</div><!--explore-->
				<div class="span-24 list">
					<ul>
						<?php
							//Шалгалтанд зориулж үүсгэсэн session-уудыг устгаж байна.
                			if(isset($_SESSION['qids'])) unset($_SESSION['qids']);
                			if(isset($_SESSION['qcursor'])) unset($_SESSION['qcursor']);
                			if(isset($_SESSION['stdscore'])) unset($_SESSION['stdscore']);
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
						            printf("<li><a href=\"lesson.php?grade=%d\">%s</a><br /><p>%s</p></li>", $id, $name, $description);
						        }
								//Бичсэн query-гээ хүчингүй болгож байна.
						        $result->close();
						    }
							//Нээсэн баазаасаа холболт таслаж байна. Зайлшгүй ийм байх ёстой үгүйг мэдэхгүй ч ингэх нь дээр.
						    $mysqli->close();
						?>
					</ul>
				</div><!--list-->
			</div><!--main-->
		</div><!--content-->
		<div class="fooder">
			<p>This is fooder</p>
		</div><!--fooder-->
=======
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    		<link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
			<link type="text/css" rel="stylesheet" href="css/css.css" />
	</head>
    <body class="background" >
    <!-- Contaner begin -->
	 <div class="container">
	 		<!--menu begin-->
	 			
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
		         //printf("<a href=\"lesson.php?grade=%d\">%s</a> -- %s<br />", $id, $name, $description);
		         
		         printf("<a href=\"lesson.php?grade=%d\"><div class=\"class%s\"></div></a>",$id, $name); 
		        
		        }
				
				//Бичсэн query-гээ хүчингүй болгож байна.
		        
		        $result->close(); 
		    }
			
			//Нээсэн баазаасаа холболт таслаж байна. Зайлшгүй ийм байх ёстой үгүйг мэдэхгүй ч ингэх нь дээр.
		    
		    $mysqli->close();
		?>
		
		<!--menu end-->
		<!--main begin-->
		
			<div class="span-24 main">
				<!-- Header begin -->
    			
    			<div class="span-24 header_background">
             		</div>
    			<!-- Header end -->
            	<!-- main white begin -->
            	<div class="span-23 main_white">
              		<!-- left_home_page begin -->
                    
                    <div class="span-7 left_home_page">
                		<div class="home_page_ropot"></div>
                	</div>
                    <!-- left_home_page end -->
                	<!-- right_home_page begin -->
                    <div class="span-15 right_home_page">
                		<div class="right_title">
                    	<h1>Бага боловсролын</h1><h2>Цахим хичээл</h2>
                    	</div>
                   		 <div class="right_txt">
                    <img class="image" width="194" height="142" src="images/xo.png"/>
                    <p>Сайн байцгаана уу?  Та бүхэнд энэ өдрийн мэндийг хүргэе. Манай  <a href="#">www.laptop. gov.mn</a>  
							сайт нь өдөр бүр сургууль,  багш , эцэг эх, 
							сурагчид  та бүхний мэдлэг оюунд нэмэр 
							болох сонирхолтой, хэрэгтэй мэдээ 
							мэдээллээр баяжигдаж,  шинэчлэгдэж 
                    байдаг билээ.</p>
                    
                    </div>
                </div>
                <!-- rigth_home_right end -->
            </div>
             <!-- main white end -->
		</div>

	</div>
<!-- main end-->
		
		</div>
		<!-- Container end-->		
		
		<div class="footer" align="center">
			<div class="footer1">
    			<a href="#"><div class="footer2"></div></a>
        <div class="footer3" align="left">
        	<div class="footer3_txt"><h9>Та бүхэн манай вэбийг <a href="#">firefox</a> дээр үзвэл илүү гоё шүү!</h9></div>
            <div class="footer3_txt1"><h9>ХҮҮХЭД БҮРТ КОМПЬЮТЭР ХӨТӨЛБӨР ХЭРЭГЖҮҮЛЭХ НЭГЖ</h9></div>
        </div>
        <a href="#"><div class="footer4"></div></a>
    </div>
</div>
>>>>>>> 88af68633095755837f62a640421c0cf510433a9
    </body>
</html>
