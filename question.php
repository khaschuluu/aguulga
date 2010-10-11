<?php
    session_start();
    if(!isset($_SESSION['stdscore']))
    {
        $_SESSION['stdscore'] = 0;
        $stdscore = $_SESSION['stdscore'];
    }
    if(!isset($_SESSION['qids']))
    {
        $_SESSION['qcursor'] = 0;
        $_SESSION['qids'] = array();
	   	include "db.php";
	    if($result = $mysqli->prepare('SELECT id FROM question WHERE test_id = ?'))
	    {
            $result->bind_param("i", $_GET['test']);
	        $result->execute();
	        $result->bind_result($qids);
	        while($result->fetch())
	        {
                array_push($_SESSION['qids'], $qids);
	        }
	        $result->close();
	    }
	    $mysqli->close();
    }
    else
    {
        if(isset($_POST['answer']))
        {
            include "db.php";
            if($result = $mysqli->prepare('SELECT istrue FROM answer WHERE question_id = ? AND id = ?'))
            {
                $result->bind_param("ii", $_SESSION['qids'][$_SESSION['qcursor']], $_POST['answer']);
                $result->execute();
                $result->bind_result($istrue);
                echo "IsTrue юу: " . $istrue . "<br />";
                while($result->fetch())
                {
                    echo "IsTrue: " . $istrue . "<br />";
                    if($istrue == 1)
                    {
                        $_SESSION['stdscore'] = $_SESSION['stdscore'] + 10;
                        echo $stdscore = $_SESSION['stdscore'];
                        $correct = "Correct";
                    }
                    else
                    {
                        $_SESSION['stdscore'] = $_SESSION['stdscore'] - 1;
                        echo $stdscore = $_SESSION['stdscore'];
                        $correct = "Not correct";
                    }
                }
                $_SESSION['qcursor'] += 1;
                if($_SESSION['qids'][$_SESSION['qcursor']] == null)
                {
                    unset($_SESSION['qids']);
                    unset($_SESSION['qcursor']);
                    unset($_SESSION['stdscore']);
                }
                $result->close();
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
        <form action="question.php?test=<?php echo $_GET['test'] ?>" method="post" name="send_answer">
		    <?php
                echo "Now question: " . $_SESSION['qids'][$_SESSION['qcursor']] . "<br />";
                echo "Now question cursor: " . $_SESSION['qcursor'] . "<br />";
                if(isset($_SESSION['qcursor']))
                {
		       	    include "db.php";
                    if($result = $mysqli->prepare('SELECT question FROM question WHERE test_id = ? AND id = ?'))
                    {
                        $result->bind_param("ii", $_GET['test'], $_SESSION['qids'][$_SESSION['qcursor']]);
                        $result->execute();
                        $result->bind_result($question);
                        while($result->fetch())
                        {
                            echo $question . "<br />";
                        }
                        $result->close();
                    }
		            if($result = $mysqli->prepare('SELECT id, answer FROM answer WHERE question_id = ?'))
		            {
                        $result->bind_param("i", $_SESSION['qids'][$_SESSION['qcursor']]);
		                $result->execute();
		                $result->bind_result($answerid, $answer);
		                while($result->fetch())
		                {
		                    printf("<input type=\"radio\" name=\"answer\" value=\"%d\" />%s<br />", $answerid, $answer);
		                }
		                $result->close();
		            }
		            $mysqli->close();
                    //session_destroy();
                }
		    ?>
            <input type="submit" value="Оруулах" />
        </form>
        <?php
            echo $correct . "<br />";
            echo "Оноо: " . $stdscore;
        ?>
    </body>
</html>
