<?php
	session_start();
	unset($_SESSION['covid_username']);
	header("Location:login.php");
?>