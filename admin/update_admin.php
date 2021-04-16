<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<div class="manage_page">
	<h1 style="padding: 10px;">UPDATE ADMIN</h1>

<?php
	
	$old_email_id=$_GET['id'];
	$query="select * from admin where email_id='$old_email_id'";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);

	$fname=$row['fname'];
	$lname=$row['lname'];
	$phone_no=$row['phone_no'];
	$username=$row['username'];
	$image=$row['admin_photo'];
?>

<style type="text/css">

	nav .active1{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>

<form action="" method="POST" enctype="multipart/form-data">
	<table>

		<tr>
			<td><h3>Admin E-Mail ID :</h3></td>
			<td>
				<input type="email" name="email_id" value="<?php echo $old_email_id;?>">
			</td>
		</tr>
		<tr>
			<td><h3>Admin First Name :</h3></td>
			<td>
				<input type="text" name="fname" value="<?php echo $fname; ?>">
			</td>
		</tr>

		<tr>
			<td><h3>Admin Second Name :</h3></td>
			<td>
				<input type="text" name="lname" value="<?php echo $lname; ?>">
			</td>
		</tr>

		<tr>
			<td><h3>Admin Phone Number :</h3></td>
			<td>
				<input type="text" name="phone_no" value="<?php echo $phone_no; ?>">
			</td>
		</tr>

		<tr>
			<td><h3>Admin User Name :</h3></td>
			<td>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</td>
		</tr>

		<tr>
			<h3><td>Current Image :</h3></td>
			<td>
				<?php
					if($image!="")
					{
				?>
					<img src="<?php echo $image;?>" width="200">
				<?php
					}
					else
					{
						echo "NO IMAGE FOUND";
					}
				?>
			</td>
		</tr>	
		
		<tr>
			<h3><td>New Image :</h3></td>
			<td>
				<input type="file" name="image">
			</td>
		</tr>

	</table>
		
		<input type="hidden" name="oldimage" value="<?php echo $image;?>" >
		<input type="hidden" name="old_email_id" value="<?php echo $old_email_id?>">
		
		<input type="submit" value="Update" name="Update" style="color: white;background-color: #1e90ff;padding: 10px;">

</form>

</div>


<?php

	if(isset($_POST['Update']))
	{

		$old_email_id=$_POST['old_email_id'];
		$email_id=$_POST['email_id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$phone_no=$_POST['phone_no'];
		$username=$_POST['username'];
		$image=$_FILES['image'];
		$oldimage=$_POST['oldimage'];
		$destination="";
		
		if($image['name']!="")
		{

			if($oldimage!="")
			{
				unlink($oldimage);
			}
			
			$filename=$image['name'];
			$filepath=$image['tmp_name'];
			$fileerror=$image['error'];

			if($fileerror==0)
			{
				$destination="../Images/Admin/".$filename;
				move_uploaded_file($filepath,$destination);
			}

		}
		else
		{
			$destination=$oldimage;
		}

		$query="update admin set email_id='$email_id',fname='$fname',lname='$lname',phone_no='$phone_no',username='$username',admin_photo='$destination' where email_id='$old_email_id'";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['update']="<script>alert('Updated Successfully');</script>";
			header("location:".$siteurl."admin/manage_admin.php");
		}
		else
		{
			$_SESSION['update']="<scrpit>alert('Failed to Update');</script>";
			header("location:".$siteurl."admin/manage_admin.php");
		}
	}
?>

<?php
	include '../templete/footer.php';
?>