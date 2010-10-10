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
        if(isset($_POST['grade_id']) && isset($_POST['lesson_name']) && isset($_POST['lesson_description']))
        {
            $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
            $mysqli->query("SET NAMES 'utf8'");
            if($stmt = $mysqli->prepare("INSERT INTO lesson(grade_id, name, description) values(?, ?, ?)"))
            {
                $stmt->bind_param("iss",$_POST['grade_id'], $_POST['lesson_name'], $_POST['lesson_description']);
                $stmt->execute();
                $notice = $stmt->affected_rows . " хичээл нэмэгдлээ.";
                $stmt->close();
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
        <form action="add_lesson.php" method="post" name="add_grade">
            Анги:
            <select name="grade_id">
            <?php
				//Энд нэг шинэ юм гарч ирэв.
				//Учир нь бид шинэ мэдээлэл нэмэхдээ өөр ямар нэгэн хүснэгтэнд харгалзуулж хийх хэрэгтэй бол яг аль хүснэгтийг заахыг нь заах хэрэгтэй.
				//Тиймээс харгалзуулах хүснэгтийн аль мөрт харгалзуулах сонголтыг зурж өгөх хэрэгтэй.
				//Ингэхийн тулд тухайн хүснэгтийн мэдээллүүдийг баазаас дуудаад, мөр мөрөөр нь салгаж тус тусд нь сонгодгоор хийнэ.
				//Тэгээд нэрнүүдээс сонголт хийхэд сонгосон нэрний баазад харгалзах мөрийн id-г нь буцаана.
				//Мэдээж шинээр нэмж буй мэдээлэлд маань өмнөх хүснэгтийг заасан багана бий.
                $mysqli = new mysqli('localhost', 'root', 'root', 'aguulga') or die("Can't connect to MySQL server");
                $mysqli->query("SET NAMES 'utf8'");
                if($result = $mysqli->prepare('SELECT id, description FROM grade ORDER BY id'))
                {
                    $result->execute();
                    $result->bind_result($grade_id, $grade_description);
                    while($result->fetch())
                    {
						//Дээр HTML дээр <select> гэдэг таг нээсэнийг хар.
						//Энэ таг дотор <option> тагуудыг нэмсэнээр тэд бүгд сонгогдох combobox болж гарч ирдэг.
						//Сонголт бүрийг мөрөөр нь салгаж аваад доорх таг дотор хэвлэж байна.
						//Текстд нь нэрийг өгөөд сонгогдсон үед авах утгад нь id-г нь оноож байна.
						//Ингэснээр бид хэдий текст сонгосон ч id нь утга болж дээшээ очих юм.
                        printf("<option value=\"%d\">%s</option>", $grade_id, $grade_description);
                    }
                    $result->close();
                }
                $mysqli->close();

            ?>
            </select><br />
            Хичээлийн нэр:
            <input type="text" name="lesson_name" /><br />
            Хичээлийн тайлбар:
            <input type="text" name="lesson_description" /><br />
            <input type="submit" value="Оруулах" />
        </form>
        <a href="index.php">Буцах</a> | <a href="../index.php">Нүүр</a>
    </body>
</html>
