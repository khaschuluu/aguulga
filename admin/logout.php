<?php
	session_start();
	global $error;
	if(isset($_SESSION['admin']))
	{
		if(isset($_POST['logout']))
		{
			unset($_SESSION['admin']);
			header("Location: login.php");
		}
		else
		{
			header("Location: index.php");
		}
	}
	else
	{
		$error = "Та нэвтэрч орно уу!";
		header("Location: login.php");
	}
?>
