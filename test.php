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
		<link type="text/css" rel="stylesheet" href="css/css.css"/>
    	<link type="text/css" rel="stylesheet" href="css/blueprint/screen.css"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
	</head>
    <body class="background">
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
    <a href="#"><div class="class<?php echo $_SESSION['grade']; ?>_1"></div></a>
        <!--menu end-->
        <div class="class<?php echo $_SESSION['grade']; ?>_header"></div>
        <div class="test">
        	<div class="onol_link"><a href="theory.php?subsubject=<?php echo $_GET['subsubject']; ?>"><h6>Онол</h6></a></div> 
            <div class="onol_link"><a href="game.php?subsubject=<?php echo $_GET['subsubject']; ?>"><h6>Дадлага</h6></a></div> 
            <div class="onol_link"><a href="#"><h5>Тест</h5></a></div>
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
									if($stmt = $mysqli->prepare("SELECT * FROM test WHERE subsubject_id = ? ORDER BY id"))
		    						{
		        						$stmt->bind_param("i", $_GET['subsubject']);
		        						$stmt->execute();
		        						$stmt->bind_result($id, $subsubject_id, $name, $description);
		        						while($stmt->fetch())
		        						{
		            					//printf("<a href=\"question.php?test=%d\">%s</a> -- %s<br />", $id, $name, $description);
		            					printf("<div class=\"list_menu_%d\"><a href=\"question.php?test=%d\" ><h4>%s</h4></a><div class=\"circle\"></div></div>",$_SESSION['grade'], $id, $name);   
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
    </body>
</html>
