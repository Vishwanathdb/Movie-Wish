<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<style type="text/css">

	nav .active4{
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
	<h1 style="padding: 10px;">ADD LANGUAGE</h1>

	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			
			<tr>
				<td><h3>Enter the Language Name : </h3></td>
				<td>
					<input type="text" name="name" required>
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
				<td><h3>Upload image : </h3></td>
				<td>
					<input type="file" name="image">
				</td>
			</tr>

		</table>

		<input type="submit" value="Add" name="Add" class="add_button">

	</form>

</div>


<?php

	if(isset($_POST['Add']))
	{

		$name=$_POST['name'];
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
				$destination="../Images/Language/".$filename;
				move_uploaded_file($filepath,$destination);
			}
		}

		$query="insert into language set language_name='$name',active='$active',language_photo='$destination'";

		$res=mysqli_query($con,$query);


		if($res==true)
		{
			$_SESSION['success']="<script>alert('Successfully Added');</script>";
			header("location:".$siteurl."admin/manage_language.php");
		}
		else
		{
			$_SESSION['fail']="<script>alert('Failed to Add');</script>";
			header("location:".$siteurl."admin/add_language.php");
		}
	}
?>


<?php
	include '../templete/footer.php';
?>