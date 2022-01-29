<?php
include'server.php';

//logout 
if(isset($_GET['logout'])){

	session_destroy();

	session_unset();

	session_regenerate_id();

	unset($_SESSION['uid']);
	unset($_SESSION['otp_verified']);
	header('Location: ../php/login.php');
}
?>