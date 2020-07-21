<?php
	session_start();
	unset($_SESSION['operator_username']);
	header("Location:../../../dashboard");
?>