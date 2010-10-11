<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
		<?php 
			include "db.php";
			$question_stmt = $mysqli->prepare("SELECT * FROM question WHERE test_id = ?");
			$question_stmt->bind_param("i", $_GET['test']);
			$question_stmt->execute();
			$question_stmt->bind_result($id, $test_id, $question, $type);
				while($question_stmt->fetch())
				{
				 	include "db.php";
					$answer_stmt = $mysqli->prepare("SELECT * FROM answer WHERE question_id = ?");
					$answer_stmt->bind_param('i', $id);
					$answer_stmt->execute();
					$answer_stmt->bind_result($answer_id, $question_id, $answer, $istrue);
					
										
						printf("id:%d<br />", $id);
						printf("Asuult:<br />%s<br />", $question);
						while($answer_stmt->fetch())
						{
							printf("<label><input type='radio'  />%s</label><br />", $answer);

						}
					
					$answer_stmt->close();
					$mysqli->close();
				}
				

			
			$question_stmt->close();
			$mysqli->close();
		?>
	</body>
</html> 
