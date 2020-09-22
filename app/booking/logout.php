<?php
	session_start();
	unset($_SESSION['booking_username']);
	header("Location:login.php");
?>