<?php
	
	include('../templete/connection.php');

	//1. Delete all the session 
	session_destroy();//Unset $_SESSION['user']

	//2. Redirect to login
	header('location:'.$siteurl.'admin/login.php');
?>