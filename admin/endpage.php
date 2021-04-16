<?php
	session_start();

	if(isset($_SESSION['update']))
	{
		echo $_SESSION['update'];
		unset($_SESSION['update']);
	}

?>


<h1 style="font-weight: bold;text-align: center;padding: 10px;margin: 10x">PLEASE TERMINATE THE TAB !!!!!</h1>