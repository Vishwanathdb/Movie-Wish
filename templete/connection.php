<?php
	
	session_start();

	$server="localhost";
	$password="";
	$username="root";
	$database="movie_wish";
	$siteurl="http://localhost:81/Movie-WISH/";

	$con=mysqli_connect($server,$username,$password,$database);

	if($con)
	{
	}
	else
	{
		die("Failed to connect to database");
	}
?>