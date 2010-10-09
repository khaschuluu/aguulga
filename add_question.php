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
        if(isset($_POST['test_id']) && isset($_POST['question']) && isset($_POST['question_type']) && isset($_POST['answer_1']))
        {
            $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
            $mysqli->query("SET NAMES 'utf8'");
            if($stmt = $mysqli->prepare("INSERT INTO quesion(test_id, quesion, type) values(?, ?, ?)"))
            {
                $stmt->bind_param("iss",$_POST['test_id'], $_POST['quesion'], $_POST['question_type']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " aсуулт нэмэгдлээ.";
                $stmt->close();
				$query = "SELECT id FROM question WHERE question = '?' AND type = ?";
				if($stmt = $mysqli->prepare($query))
                {
					$stmt->bind_param("si", $_POST['question'], $_POST['question_type']);
                    $stmt->execute();
                    $stmt->bind_result($question_id);
                    $stmt->close();
                }
				if($stmt = $mysqli->prepare("INSERT INTO answer(quesion_id, answer, true) values(?, ?, ?)"))
            	{
					$anwser_true = 0;
					if(isset($_POST['answer_1_true']))
						$answer_true = 1;
            	    $stmt->bind_param("iss",$question_id, $_POST['answer_1'], $answer_true);
            	    $stmt->execute();
            	    $notice = $stmt->affected_rows . " харгалзах хариулт-1 нэмэгдлээ.";
            	    $stmt->close();
            	}
				if(isset($_POST['answer_2']) && $stmt = $mysqli->prepare("INSERT INTO answer(quesion_id, answer, true) values(?, ?, ?)"))
            	{
					$anwser_true = 0;
					if(isset($_POST['answer_2_true']))
						$answer_true = 1;
            	    $stmt->bind_param("iss",$question_id, $_POST['answer_2'], $answer_true);
            	    $stmt->execute();
            	    $notice = $stmt->affected_rows . " харгалзах хариулт-2 нэмэгдлээ.";
            	    $stmt->close();
            	}
				if(isset($_POST['answer_3']) && $stmt = $mysqli->prepare("INSERT INTO answer(quesion_id, answer, true) values(?, ?, ?)"))
            	{
					$anwser_true = 0;
					if(isset($_POST['answer_3_true']))
						$answer_true = 1;
            	    $stmt->bind_param("iss",$question_id, $_POST['answer_3'], $answer_true);
            	    $stmt->execute();
            	    $notice = $stmt->affected_rows . " харгалзах хариулт-3 нэмэгдлээ.";
            	    $stmt->close();
            	}
				if(isset($_POST['answer_4']) && $stmt = $mysqli->prepare("INSERT INTO answer(quesion_id, answer, true) values(?, ?, ?)"))
            	{
					$anwser_true = 0;
					if(isset($_POST['answer_4_true']))
						$answer_true = 1;
            	    $stmt->bind_param("iss",$question_id, $_POST['answer_4'], $answer_true);
            	    $stmt->execute();
            	    $notice = $stmt->affected_rows . " харгалзах хариулт-4 нэмэгдлээ.";
            	    $stmt->close();
            	}
				if(isset($_POST['answer_5']) && $stmt = $mysqli->prepare("INSERT INTO answer(quesion_id, answer, true) values(?, ?, ?)"))
            	{
					$anwser_true = 0;
					if(isset($_POST['answer_5_true']))
						$answer_true = 1;
            	    $stmt->bind_param("iss",$question_id, $_POST['answer_5'], $answer_true);
            	    $stmt->execute();
            	    $notice = $stmt->affected_rows . " харгалзах хариулт-5 нэмэгдлээ.";
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
                $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
                $mysqli->query("SET NAMES 'utf8'");
                $query = "SELECT test.id, grade.description, lesson.name, subject.name, subsubject.name, test.name FROM test INNER JOIN subsubject ON subsubject.id = test.subsubject_id INNER JOIN subject ON subject.id = subsubject.subject_id INNER JOIN lesson ON lesson.id = subject.lesson_id INNER JOIN grade ON grade.id = lesson.grade_id ORDER BY test.id";
                if($result = $mysqli->prepare($query))
                {
                    $result->execute();
                    $result->bind_result($test_id, $grade_description, $lesson_name, $subject_name, $subsubject_name, $test_name);
                    while($result->fetch())
                    {
                        printf("<option value=\"%d\">%s - %s - %s - %s - %s</option>", $test_id, $grade_description, $lesson_name, $subject_name, $subsubject_name, $test_name);
                    }
                    $result->close();
                }
                $mysqli->close();

            ?>
            </select><br />
            Асуулт:
            <input type="text" name="quesion" /><br />
            Асуултын төрөл:
			<select name="question_type">
				<option value="0">Сонгодог</option>
				<option value="1">Чагталдаг</option>
				<option value="2">Нөхдөг</option>
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
        <a href="admin.php">Буцах</a> | <a href="index.php">Нүүр</a>
    </body>
</html>
