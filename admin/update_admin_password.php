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


<div class="manage_page">
	<h1 style="padding: 10px;">UPDATE EMAIL ID</h1>



<form action="" method="POST">
	<table>

		<tr>
			<td><h3>Enter New Password :</h3></td>
			<td>
				<input type="password" name="new_password" required>
			</td>
		</tr>

		<tr>
			<td><h3>Confirm New Password:</h3></td>
			<td>
				<input type="password" name="confirm_password" required>
			</td>
		</tr>

		

	</table>
		
		
		<input type="submit" value="Change Password" name="Update" style="color: white;background-color: #1e90ff;padding: 10px;">

</form>

</div>


<?php

	if(isset($_POST['Update']))
	{
		$new_password=$_POST['new_password'];
		$confirm_password=$_POST['confirm_password'];
		$username=$_SESSION["username"];
		

		if($new_password==$confirm_password)
		{
			$password=password_hash($new_password, PASSWORD_BCRYPT);
		
			$query="update admin set password='$password' where username='$username';";

			$res=mysqli_query($con,$query);

			if($res==true)
			{
				$_SESSION['update']="<script>alert('Updated Successfully');</script>";
				header("location:".$siteurl."admin/manage_admin.php");
			}
			else
			{
				$_SESSION['update']="<script>alert('Failed to Update');</script>";
				header("location:".$siteurl."admin/manage_admin.php");
			}
		}
		else
		{
			$_SESSION['update']="<script>alert('Failed to Update');</script>";
			header("location:".$siteurl."admin/manage_admin.php");
		}
	}
?>

<?php
	include '../templete/footer.php';
?>
