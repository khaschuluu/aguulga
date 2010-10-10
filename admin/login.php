<?php
    session_start();
    global $error;
    if(isset($_SESSION['admin']))
    {
        header("Location: index.php");
    }
    else
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $name = "admin";
            $pass = "admin";
            if($name == $_POST['username'] && $pass == $_POST['password'])
            {
                $_SESSION['admin'] = $_POST['username'];
                header("Location: login.php");
            }
            else
            {
                $error = "Хэрэглэгчийн нэр, эсвэл нууц үг буруу байна.";
                header("Locatoin: login.php");
            }
        }
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>
    <body>
        <form action="login.php" method="post" name="logform">
            Username:
            <input type='text' name="username" /><br />
            Password:
            <input type='password' name="password" /><br />
            <input type='submit' value="Нэвтрэх" />
        </form>
        <?php
            printf("%s", $error);
        ?>
    </body>
</html>
