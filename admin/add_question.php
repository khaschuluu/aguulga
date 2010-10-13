<?php
    session_start();
    global $error;
    if(!isset($_SESSION['admin']))
    {
        $error = "Та нэвтэрч орно уу!";
        header("Location: login.php");
    }
    else
    {
        if(isset($_POST['test_id']) && isset($_POST['question']) && isset($_POST['question_type']))
        {
			include "../db.php";
			//Шинэ асуултаа оруулж байна.
            if($stmt = $mysqli->prepare("INSERT INTO question(test_id, question, type) values(?, ?, ?)"))
            {
                $stmt->bind_param("isi",$_POST['test_id'], $_POST['question'], $_POST['question_type']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " aсуулт нэмэгдлээ.";
				$stmt->close();
				//Шинээр оруулсан асуултынхаа id-г авч байна.
				$qid = 0;
				if($stmt = $mysqli->prepare("SELECT MAX(id) FROM question"))
                {
                    $stmt->execute();
                    $stmt->bind_result($question_id);
					while($stmt->fetch())
                    {
						$qid = $question_id;
                    }

                    $stmt->close();
                }
				//Одоо хариултуудаа нэмж эхлэнэ.
				if($_POST['answer_1'] != "" && $stmt = $mysqli->prepare("INSERT INTO answer(question_id, answer, istrue) value(?, ?, ?)"))
                {
					$qtrue = 0;
					$answer = $_POST['answer_1'];
					//Энэ нөгөө үнэн худлыг чагталдаг зүйл чагтлагдаагүй бол утга ирэхгүй.
					//Хэрвээ утга ирвэл утгыг нь, учир нь 1 гэсэн утга буцааж байгаа.
					//Үгүй бол шууд дээр байгаа 0 гэдэг утгаа авна.
					if(isset($_POST['answer_1_true']))
						$qtrue = $_POST['answer_1_true'];
					$stmt->bind_param("isi", $qid, $answer, $qtrue);
                    $stmt->execute();
					$notice .= "<br />" . $stmt->affected_rows . " хариулт нэмэгдлээ.";
					//Хоёр дахь хариултыг шалгаад байвал нэм.
					if($_POST['answer_2'] != "")
					{
						$qtrue = 0;
						$answer = $_POST['answer_2'];
						if(isset($_POST['answer_2_true']))
							$qtrue = $_POST['answer_2_true'];
                    	$stmt->execute();
						$notice .= "<br />" . $stmt->affected_rows . " хариулт нэмэгдлээ.";
						//Гурав дахь хариултыг шалгаад байвал нэм.
						if($_POST['answer_3'] != "")
						{
							$qtrue = 0;
							$answer = $_POST['answer_3'];
							if(isset($_POST['answer_3_true']))
								$qtrue = $_POST['answer_3_true'];
                    		$stmt->execute();
							$notice .= "<br />" . $stmt->affected_rows . " хариулт нэмэгдлээ.";
							//Дөрөв дэх хариултыг шалгаад байвал нэм.
							if($_POST['answer_4'] != "")
							{
								$qtrue = 0;
								$answer = $_POST['answer_4'];
								if(isset($_POST['answer_4_true']))
									$qtrue = $_POST['answer_4_true'];
                    			$stmt->execute();
								$notice .= "<br />" . $stmt->affected_rows . " хариулт нэмэгдлээ.";
								//Тав дахь хариултыг шалгаад байвал нэм.
								if($_POST['answer_5'] != "")
								{
									$qtrue = 0;
									$answer = $_POST['answer_5'];
									if(isset($_POST['answer_5_true']))
										$qtrue = $_POST['answer_5_true'];
                    				$stmt->execute();
									$notice .= "<br />" . $stmt->affected_rows . " хариулт нэмэгдлээ.";
								}
							}
						}
					}
                    $stmt->close();
                }

			}
            $mysqli->close();
        }
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
        <?php
            if($notice != null)
                echo $notice . "<br />";
        ?>
        <form action="add_question.php" method="post" name="add_question">
            Тэст:
            <select name="test_id">
            <?php
                include "../db.php";
				$query = "SELECT test.id, grade.description, lesson.name, subject.name, subsubject.name, test.name FROM test INNER JOIN subsubject ON subsubject.id = test.subsubject_id INNER JOIN subject ON subject.id = subsubject.subject_id INNER JOIN lesson ON lesson.id = subject.lesson_id INNER JOIN grade ON grade.id = lesson.grade_id ORDER BY test.id";
                if($result = $mysqli->prepare($query))
                {
                    $result->execute();
                    $result->bind_result($test_id, $grade_description, $lesson_name, $subject_name, $subsubject_name, $test_name);
                    while($result->fetch())
                    {
                        printf("<option value=\"%d\">%s - %s - %s - %s - %s</option><br />", $test_id, $grade_description, $lesson_name, $subject_name, $subsubject_name, $test_name);
                    }
                    $result->close();
                }
                $mysqli->close();
            ?>
            </select><br />
            Асуулт:
            <input type="text" name="question" /><br />
            Асуултын төрөл:
			<select name="question_type">
				<option value="0">Сонгодог</option>
				<!--option value="1">Чагталдаг</option>
				<option value="2">Нөхдөг</option-->
			</select><br />
			Хариулт 1:
			<input type="text" name="answer_1" />
			<input type="checkbox" name="answer_1_true" value="1" checked />Үнэн<br />
			Хариулт 2:
			<input type="text" name="answer_2" />
			<input type="checkbox" name="answer_2_true" value="1" />Үнэн<br />
			Хариулт 3:
			<input type="text" name="answer_3" />
			<input type="checkbox" name="answer_3_true" value="1" />Үнэн<br />
			Хариулт 4:
			<input type="text" name="answer_4" />
			<input type="checkbox" name="answer_4_true" value="1" />Үнэн<br />
			Хариулт 5:
			<input type="text" name="answer_5" />
			<input type="checkbox" name="answer_5_true" value="1" />Үнэн<br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="index.php">Буцах</a> | <a href="../index.php">Нүүр</a>
    </body>
</html>
