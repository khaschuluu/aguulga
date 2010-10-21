<?php 
	session_start();
	$_SESSION['subsubject'] = $_GET['subsubject'];
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
						    if($stmt = $mysqli->prepare("SELECT grade.id, grade.name, lesson.id, lesson.name, subject.id, subject.name, subsubject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? WHERE lesson.id = ?"))
						    {
						        $stmt->bind_param("iiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject']);
						        $stmt->execute();
						        $stmt->bind_result($grade_id, $grade_name, $lesson_id, $lesson_name, $subject_id, $subject_name, $subsubject_name);
						        while($stmt->fetch())
						        {
									printf("<li><a href=\"lesson.php?grade=%d\">%s</a></li>", $grade_id, $grade_name);
						            printf("<li><a href=\"subject.php?lesson=%d\">%s</a></li>", $lesson_id, $lesson_name);
						            printf("<li><a href=\"subsubject.php?subject=%d\">%s</a></li>", $subject_id, $subject_name);
						            printf("<li><a href=\"#\">%s</a></li>", $subsubject_name);
						            printf("<li><a href=\"#\">Онол</a></li>", $subsubject_id, $subsubject_name);
						        }
						        $stmt->close();
						    }
						    $mysqli->close();
        				?>
					</ul>
				</div><!--explore-->

				<div class="span-24 list">
					<center>
						<?php
						    include "db.php";
							if($stmt = $mysqli->prepare("SELECT description FROM theory WHERE subsubject_id = ?"))
						    {
						        $stmt->bind_param("i", $_GET['subsubject']);
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
					</center>
				</div><!--list-->
			</div><!--main-->
		</div><!--container-->
		<div class="fooder">
			<p>This is fooder</p>
		</div><!--fooder-->
=======
		  <link type="text/css" rel="stylesheet" href="css/css.css"/>
    	  <link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
	</head>
    <body>
        <?php
			include "db.php";
		    if($stmt = $mysqli->prepare("SELECT grade.description, lesson.name, subject.name, subsubject.name FROM lesson INNER JOIN grade ON grade.id = ? INNER JOIN subject ON subject.id = ? INNER JOIN subsubject ON subsubject.id = ? WHERE lesson.id = ?"))
		    {
		        $stmt->bind_param("iiii", $_SESSION['grade'], $_SESSION['lesson'], $_SESSION['subject'], $_SESSION['subsubject']);
		        $stmt->execute();
		        $stmt->bind_result($grade, $lesson, $subject, $subsubject);
		        while($stmt->fetch())
		        {
		           // echo $grade . ">" . $lesson . ">" . $subject . ">" . $subsubject . "<br />";
		        }
		        $stmt->close();
		    }
		    $mysqli->close();
        ?>
		
		<!-- Contaner begin -->
<div class="container"> 
		<!--menu begin-->
    <a href="#"><div class="class<?php echo $_SESSION['grade'] ?>_1"></div></a>
        <!--menu end-->
        <div class="class<?php echo $_SESSION['grade'] ?>_header"></div>
        <div class="onol">
        		<div class="onol_link"><a href="theory.php?subsubject=<?php echo $_SESSION['subsubject'];?>"><h5>Онол</h5></a></div> 
            <div class="onol_link"><a href="game.php?subsubject=<?php echo $_SESSION['subsubject']; ?>"><h6>Дадлага</h6></a></div>
            <div class="onol_link"><a href="test.php?subsubject=<?php echo $_SESSION['subsubject'];?>"><h6>Тест</h6></a></div>
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
                    
                    	<div class="title"><h7><?php echo $subsubject; ?></h7></div>
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
		        						$stmt->bind_param("i", $_GET['subsubject']);
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
