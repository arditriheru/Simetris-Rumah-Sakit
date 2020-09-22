<?php
	session_start();
	unset($_SESSION['suket_username']);
	header("Location:login.php");
?>