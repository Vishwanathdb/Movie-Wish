<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<div class="manage_page">
	<h1 style="padding: 10px;">UPDATE ARTIST</h1>

<?php
	
	$id=$_GET['id'];
	$query="select * from artist where artist_id=$id";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);

	$name=$row['artist_name'];
	$gender=$row['artist_gender'];
	$active=$row['Active'];
	$image=$row['artist_photo'];
?>


<style type="text/css">

	nav .active2{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>


<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td><h3>Artist Name :</h3></td>
			<td>
				<input type="text" name="name" value="<?php echo $name; ?>">
			</td>
		</tr>

		<tr>
			<td><h3>Artist Gender :</h3></td>
			<td>
				<input <?php if($gender=="Male") {echo "checked";}?> type="radio" name="gender" value="Male">Male
				<input <?php if($gender=="Female") {echo "checked";}?> type="radio" name="gender" value="Female">Female	
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
		
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<input type="hidden" name="oldimage" value="<?php echo $image;?>" >
		
		<input type="submit" value="Update" name="Update" style="color: white;background-color: #1e90ff;padding: 10px;">

</form>

</div>


<?php

	if(isset($_POST['Update']))
	{

		$id=$_POST['id'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$active=$_POST['active'];
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
				$destination="../Images/Artist/".$filename;
				move_uploaded_file($filepath,$destination);
			}

		}
		else
		{
			$destination=$oldimage;
		}

		$query="update artist set artist_name='$name',artist_gender='$gender',active='$active',artist_photo='$destination' where artist_id=$id";

		$res=mysqli_query($con,$query);


		if($res==true)
		{
			$_SESSION['update']="<script>alert('Updated Successfully');</script>";
			header("location:".$siteurl."admin/manage_artist.php");
		}
		else
		{
			$_SESSION['update']="<scrpit>alert('Failed to Update');</script>";
			header("location:".$siteurl."admin/manage_artist.php");
		}
	}
?>

<?php
	include '../templete/footer.php';
?>