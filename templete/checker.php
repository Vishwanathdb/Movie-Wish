<?php

	include '../templete/connection.php';

	if(!isset($_SESSION['login']))
	{
		$_SESSION['no-login-message']='<script>alert("Please Login to Access Admin Panel")</script>';
		header('location:'.$siteurl.'admin/login.php');
	}


?>