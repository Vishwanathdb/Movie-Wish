<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<style type="text/css">

	nav .active2{
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
	<h1 style="padding: 10px;">ADD ARTIST</h1>

	<form action="" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td><h3>Enter the name :</h3></td>
				<td>
					<input type="text" name="name" required> 
				</td>
			</tr>

			<tr>
				<td><h3>Enter the gender :</td>
				<td>
					 <input type="radio" name="gender" value="Male" required>Male 
					 <input type="radio" name="gender" value="Female">Female</h3>
				</td>
			</tr>

			<tr>
				<td><h3>Active :</td>
				<td>
					 <input type="radio" name="active" value="Yes" required>Yes 
					 <input type="radio" name="active" value="No" required>No</h3>
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

		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$active=$_POST['active'];
		$image=$_FILES['image'];
		$destination="";

		if($image['name']!="")
		{
			$filename=$image['name'];
			$filepath=$image['tmp_name'];
			$fileerror=$image['error'];

			if($fileerror==0)
			{
				$destination="../Images/Artist/".$filename;
				move_uploaded_file($filepath,$destination);
			}
		}

		$query="insert into artist set artist_name='$name',artist_gender='$gender',active='$active',artist_photo='$destination'";

		$res=mysqli_query($con,$query);


		if($res==true)
		{
			$_SESSION['success']="<script>alert('Successfully Added');</script>";
			header("location:".$siteurl."admin/manage_artist.php");
		}
		else
		{
			$_SESSION['fail']="<script>alert('Failed to Add');</script>";
			header("location:".$siteurl."admin/add_artist.php");
		}
	}
?>


<?php
	include '../templete/footer.php';
?>