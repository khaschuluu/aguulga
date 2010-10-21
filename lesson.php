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
		  <link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
		  <link type="text/css" rel="stylesheet" href="css/css.css" />
    </head>
    <body class="background">
        <?php
			include "db.php";
		    if($stmt = $mysqli->prepare("SELECT description FROM grade WHERE id = ?"))
		    {
		        $stmt->bind_param("i", $_SESSION['grade']);
		        $stmt->execute(); 
		        $stmt->bind_result($grade);
		        while($stmt->fetch())
		        {
		            //echo $grade . "<br />";
		        }
		        $stmt->close(); 
		    }
		    $mysqli->close();
        ?>
		
		
		
		<!-- Contaner begin -->
<div class="container"> 
		<!--menu begin-->
    <a href="index.php"><div class="class<?php echo $_SESSION['grade'] ?>_1"></div></a>
        <!--menu end-->
        <div class="class<?php echo $_SESSION['grade']?>_header"></div>
        <div class="cloud"><h3>БҮЛЭГ СЭДЭВ</h3></div>
	
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
                		<a href="index.php"><div class="back"></div></a>
                        <div class="ropot"></div> 
                	</div>
                    <!-- left_home_page end -->
                	<!-- right_home_page begin -->
                    <div class="span-15 right_home_page"> 
                    
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
		           // printf("<a href=\"subject.php?lesson=%d\">%s</a> -- %s<br >", $id, $name, $description);
		            printf("<div class=\"list_menu_%d\"><a href=\"subject.php?lesson=%d\"><h4>%s</h4></a><div class=\"circle\"></div></div>",$_SESSION['grade'], $id, $name);  
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
		?>
                    
 
                    
                    
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
    </body>
</html>
