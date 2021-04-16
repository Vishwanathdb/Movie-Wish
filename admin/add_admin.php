<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<style type="text/css">

	nav .active1{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>

<?php

	if(isset($_SESSION['fail']))
	{
		echo $_SESSION['fail'];
		unset($_SESSION['fail']);
	}

?>


<div class="manage_page">
	<br>
	<h1 style="padding: 10px;">ADD ADMIN</h1>

	<form action="" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td><h3>Enter the email id :</h3></td>
				<td>
					<input type="email" name="email_id" required> 
				</td>
			</tr>

			<tr>
				<td><h3>Enter the first name :</td>
				<td>
					 <input type="text" name="fname" required>
				</td>
			</tr>

			<tr>
				<td><h3>Enter the last name :</td>
				<td>
					 <input type="text" name="lname" >
				</td>
			</tr>

			<tr>
				<td><h3>Enter the phone number :</td>
				<td>
					 <input type="text" name="phone_no" required>
				</td>
			</tr>

			<tr>
				<td><h3>Enter the username :</td>
				<td>
					 <input type="text" name="username" required>
				</td>
			</tr>

			<tr>
				<td><h3>Enter the password :</td>
				<td>
					 <input type="password" name="password" required>
				</td>
			</tr>

			<tr>
				<td><h3>Confirm password :</h3></td>
				<td>
					<input type="password" name="confirm" required>
				</td>
			</tr>

			<tr>
				<td><h3>Upload image :</h3> </td>
				<td>
					<input type="FILE" name="image">
				</td> 
			</tr>

			<br>

		</table>

		<input type="submit" value="Add" name="Add" class="add_button">
		
	</form>

</div>


<?php

	if(isset($_POST['Add']))
	{

		$email_id=$_POST['email_id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$phone_no=$_POST['phone_no'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$confirm=$_POST['confirm'];
		$image=$_FILES['image'];
		$destination="";


		if($password==$confirm)
		{
			$password=password_hash($password, PASSWORD_BCRYPT);

			if($image['name']!="")
			{
				$filename=$image['name'];
				$filepath=$image['tmp_name'];
				$fileerror=$image['error'];

				if($fileerror==0)
				{
					$destination="../Images/Admin/".$filename;
					move_uploaded_file($filepath,$destination);
				}
			}

			$query="insert into admin set email_id='$email_id',fname='$fname',lname='$lname',phone_no='$phone_no',username='$username',password='$password',admin_photo='$destination'";

			$res=mysqli_query($con,$query);


			if($res==true)
			{
				$_SESSION['success']="<script>alert('Successfully Added');</script>";
				header("location:".$siteurl."admin/manage_admin.php");
			}
			else
			{
				$_SESSION['fail']="<script>alert('Failed to Add');</script>";
				header("location:".$siteurl."admin/add_admin.php");
			}
		}
		else
		{
			$_SESSION['fail']="<script>alert('Failed to Add');</script>";
			header("location:".$siteurl."admin/manage_admin.php");
		}
	}
?>


<?php
	include '../templete/footer.php';
?>