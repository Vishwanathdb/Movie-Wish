<?php
	include '../templete/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movie-Wish | Login</title>

	<style>
		body{
			background-image:url("https://st2.depositphotos.com/2731675/6332/i/950/depositphotos_63323911-stock-photo-clapperboard-with-rolls-of-film.jpg");
			background-repeat: no-repeat;
			background-size: 100% 100%; 
		
		}

		.box{
			background-color: #2c3e50;
			color: #34ace0;
			padding: 10px;
			border: 1px solid black;
			border-radius: 20px;
			width: 20%;
			margin: 10% auto;
			text-align: center;
			font-weight: bold;
		}

		.button{
			background-color: #33d9b2;
			padding: 8px;
			border-radius: 20px;
		}

		input{
			padding: 30px;
			border-radius: 18px;
		}

		input[placeholder]{
			text-align: center;
			padding: 2px;
		}

	</style>
</head>


<body>

	<?php
		if(isset($_SESSION['no-login']))
		{
			echo $_SESSION['no-login'];
			unset($_SESSION['no-login']);
		}

		if(isset($_SESSION['no-login-message']))
		{
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}

	?>
	<div class="box">

		<h1>LOGIN</h1>
		
		<form action="" method="POST">

			<p>USERNAME : </p>
			<input type="text" name="username" placeholder="Enter the Username">
			<br>
			
			<p>PASSWORD : </p>
			<input type="password" name="password" placeholder="Enter the Password">
			<br><br><br>
			
			<input type="submit" name="submit" value="Login" class="button">
			<br>

		</form>
		
		<p style="color: red;">ONLY ADMIN IS ALLOWED</p>
	</div>
</body>
</html>



<?php

	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		 $password=$_POST['password'];

		//$password=password_hash($password, PASSWORD_BCRYPT);

		$query="select * from admin where username='$username'"; 

		$res=mysqli_query($con,$query);

		$count=mysqli_num_rows($res);

		if($count==1)
		{

			$row=mysqli_fetch_array($res);



			$pass_check=password_verify($password,$row['password']);

			if($pass_check==true)
			{
				
				$_SESSION['login']='<script>alert("Logged In Successfully")</script>';
				$_SESSION['username']=$username;

				header('location:'.$siteurl.'admin/manage_admin.php');					
					
		 	}
		 	else
		 	{

		 		$_SESSION['no-login']='<script>alert("Failed to Log In. Invalid Password.")</script>';

		 		header('location:'.$siteurl.'admin/login.php');
		 	}
		 }
		 else
		 {
		 	$_SESSION['no-login']='<script>alert("Failed to Log In. Invalid Username")</script>';

		 	header('location:'.$siteurl.'admin/login.php');
		 }

	}

?>



