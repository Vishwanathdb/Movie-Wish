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

<div class="manage_page">
	<h1 style="padding: 10px;">UPDATE LANGUAGE</h1>

<?php
	$id=$_GET['id'];
	$query="select * from language where language_id=$id";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);

	$image=$row['language_photo'];
	$name=$row['language_name'];
	$active=$row['Active'];
?>


	<form action="" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td><h3>Language Name : </h3></td>
				<td>
					<input type="text" value="<?php echo $name; ?>" name="name">
				</td>				
			</tr>	

			<tr>
			<td><h3>Active :</h3></td>
				<td>
					<input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
					<input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No">No	
				</td>
			</tr>

			<tr>
				<td><h3>Current Image : </h3></td>
				<td>
					<?php
					     if($image!="")
					     {
					 ?>
					 <img src="<?php echo $image; ?>" alt="" width="200">
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
				<td><h3>New Image : </h3></td>
				<td>
					<input type="file" name="image">
				</td>
			</tr>
		</table>

			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="oldimage" value="<?php echo $image; ?>">
			<input type="submit" value="Update" name="Update" class="add_button">
	</form>
</div>

<?php

	if(isset($_POST['Update']))
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$active=$_POST['active'];
		$oldimage=$_POST['oldimage'];
		$image=$_FILES['image'];
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
				$destination="../Images/Language/".$filename;
				move_uploaded_file($filepath,$destination);
			}

		}
		else
		{
			$destination=$oldimage;
		}

		$query="update language set language_name='$name',active='$active',language_photo='$destination' where language_id=$id";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['update']="<script>alert('Updated Successfully');</script>";
			header("location:".$siteurl."admin/manage_language.php");
		}
		else
		{
			$_SESSION['update']="<scrpit>alert('Failed to Update');</script>";
			header("location:".$siteurl."admin/manage_language.php");
		}
	}
?>

<?php
include '../templete/footer.php';
?>