<?php
	//Quite simply logs the user out and redirects to the login page
	session_start();
	unset($_SESSION['user']); 
	session_destroy(); 
	header("Location:login.php");
?>