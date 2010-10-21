<?php 
	session_start();
	$_SESSION['lesson'] = $_GET['lesson'];
	//Шалгалтанд зориулж үүсгэсэн session-уудыг устгаж байна.
   	if(isset($_SESSION['qids'])) unset($_SESSION['qids']);
   	if(isset($_SESSION['qcursor'])) unset($_SESSION['qcursor']);
   	if(isset($_SESSION['stdscore'])) unset($_SESSION['stdscore']);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<<<<<<< HEAD
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
						    if($stmt = $mysqli->prepare("SELECT grade.id, grade.name, lesson.id, lesson.name FROM lesson INNER JOIN grade ON grade.id = ? WHERE lesson.id = ?"))
						    {
						        $stmt->bind_param("ii", $_SESSION['grade'], $_SESSION['lesson']);
						        $stmt->execute();
						        $stmt->bind_result($grade_id, $grade_name, $lesson_id, $lesson_name);
						        while($stmt->fetch())
						        {
						            printf("<li><a href=\"lesson.php?grade=%d\">%s</a></li>", $grade_id, $grade_name);
						            printf("<li><a href=\"subject.php?lesson=%d\">%s</a></li>", $lesson_id, $lesson_name);
						            printf("<li><a href=\"#\">Сэдвүүд</a></li>");
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
						    include "db.php";
							if($stmt = $mysqli->prepare("SELECT id, name, description FROM subject WHERE lesson_id = ? ORDER BY id"))
						    {
						        $stmt->bind_param("i", $_GET['lesson']);
						        $stmt->execute();
						        $stmt->bind_result($id, $name, $description);
						        while($stmt->fetch())
						        {
						            printf("<li><a href=\"subsubject.php?subject=%d\">%s</a><br /><p>%s</p></li>", $id, $name, $description);
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
=======
		  <link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
		  <link type="text/css" rel="stylesheet" href="css/css.css" />
	</head>
    <body class="background">
        <?php
			include "db.php";
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name FROM lesson INNER JOIN grade ON grade.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("ii", $_SESSION['grade'], $_SESSION['lesson']);
		        $stmt->execute(); 
		        $stmt->bind_result($grade, $lesson);
		        while($stmt->fetch())
		        {
		            //echo $grade . ">" . $lesson . "<br />";
		        }
		        $stmt->close(); 
		    }
		    $mysqli->close();
        ?>
      
		<!-- Contaner begin -->
<div class="container"> 
		<!--menu begin-->
    <a href="http://localhost/tengis/aguulga"><div class="class<?php echo $_SESSION['grade'] ?>_1"></div></a>
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
                		<a href="http://localhost/tengis/aguulga"><div class="back"></div></a>
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
		    if($stmt = $mysqli->prepare("SELECT id, name, description FROM subject WHERE lesson_id = ? ORDER BY id"))
		    {
		        $stmt->bind_param("i", $_GET['lesson']);
		        $stmt->execute();
		        $stmt->bind_result($id, $name, $description);
		        while($stmt->fetch()) 
		        {
		            //printf("<a href=\"subject.php?lesson=%d\">%s</a> -- %s<br >", $id, $name, $description);
		            printf("<div class=\"list_menu_%d\"><a href=\"subsubject.php?subject=%d\"><h4>%s</h4></a><div class=\"circle\"></div></div>",$_SESSION['grade'], $id, $name);  
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
>>>>>>> 88af68633095755837f62a640421c0cf510433a9
    </body>
</html>
