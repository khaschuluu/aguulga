<?php 
	session_start();
	$_SESSION['subject'] = $_GET['subject'];
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
						    if($stmt = $mysqli->prepare("SELECT grade.id, grade.name, lesson.id, lesson.name, subject.id, subject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? WHERE lesson.id = ?"))
						    {
						        $stmt->bind_param("iii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject']);
						        $stmt->execute();
						        $stmt->bind_result($grade_id, $grade_name, $lesson_id, $lesson_name, $subject_id, $subject_name);
						        while($stmt->fetch())
						        {
									printf("<li><a href=\"lesson.php?grade=%d\">%s</a></li>", $grade_id, $grade_name);
						            printf("<li><a href=\"subject.php?lesson=%d\">%s</a></li>", $lesson_id, $lesson_name);
						            printf("<li><a href=\"subsubject.php?subject=%d\">%s</a></li>", $subject_id, $subject_name);
						            printf("<li><a href=\"#\">Дэд сэдвүүд</a></li>");
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
							if($stmt = $mysqli->prepare("SELECT id, name, description FROM subsubject WHERE subject_id = ? ORDER BY id"))
						    {
						        $stmt->bind_param("i", $_GET['subject']);
						        $stmt->execute();
						        $stmt->bind_result($id, $name, $description);
						        while($stmt->fetch())
						        {
						            printf("<li>%s<br /><a class=\"item\" href=\"theory.php?subsubject=%d\">Онол</a>|<a class=\"item\" href=\"game.php?subsubject=%d\">Дадлага</a>|<a class=\"item\" href=\"test.php?subsubject=%d\">Сорил</a><br /><p>%s</p></li>", $name, $id, $id, $id, $description);
						        }
						        $stmt->close();
						    }
						    $mysqli->close();
						?>
					</ul>
				</div><!--list-->
			</div><!--main-->
		</div><!--container-->
		<div class="fooder">
			<p>This is fooder</p>
		</div><!--fooder-->
=======
		  <link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
		  <link type="text/css" rel="stylesheet" href="css/css.css" />
	</head>
    <body>
        <?php
			include "db.php";
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name, subject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("iii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject']);
		        $stmt->execute();
		        $stmt->bind_result($grade, $lesson, $subject);
		        while($stmt->fetch())
		        {
		            //echo $grade . ">" . $lesson . ">" . $subject . "<br />";
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
        ?>
		<?php 
		    include "db.php";
			if($stmt = $mysqli->prepare("SELECT id, name, description FROM subsubject WHERE subject_id = ? ORDER BY id"))
		    {
		        $stmt->bind_param("i", $_GET['subject']);
		        $stmt->execute();
		        $stmt->bind_result($id, $name, $description); 
		        while($stmt->fetch())
		        {
		            //printf("%s -- %s (<a href=\"theory.php?subsubject=%d\">Онол</a> | <a href=\"game.php?subsubject=%d\">Дадлага</a> | <a href=\"test.php?subsubject=%d\">Сорил</a>)<br >", $name, $description, $id, $id, $id);
		        }
		        $stmt->close();
		    }
		    $mysqli->close(); 
		?>
		
		<!-- Contaner begin -->
<div class="container"> 
		<!--menu begin-->
    <a href="#"><div class="class2"></div></a>
        <!--menu end-->
        <div class="class2_header"></div>
        <div class="onol">
        		<div class="onol_link"><a href="#"><h5>Онол</h5></a></div> 
            <div class="onol_link"><a href="game.php?subsubject=<?php echo $id; ?>"><h6>Дадлага</h6></a></div>
            <div class="onol_link"><a href="test.php?subsubject=<?php echo $id;?>"><h6>Тест</h6></a></div>
        </div>
	
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
                    
                    	<div class="title"><h7><?php echo $name; ?></h7></div>
                		<a href="class_2.html"><div class="back"></div></a>
                        <div class="ropot"></div>
                        
                	</div>
                    <!-- left_home_page end --> 
                	<!-- right_home_page begin -->
                    <div class="span-15 right_home_page1">
                    	
                    	<div class="onol_youtube">
                    		<?php
		    						include "db.php";
								   if($stmt = $mysqli->prepare("SELECT description FROM theory WHERE subsubject_id = ?"))
		    						{
		        						$stmt->bind_param("i", $id);
		        						$stmt->execute();
		        						$stmt->bind_result($description);
		        						while($stmt->fetch())
		        						{
		            					printf("%s", $description);
		        						}
		        						$stmt->close();
		    						}
		    						$mysqli->close();
								?>
                      	 
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
