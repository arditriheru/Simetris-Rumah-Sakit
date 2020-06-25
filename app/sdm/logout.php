<?php
session_start();
unset($_SESSION['username']);
header("Location:../sdm");
?>