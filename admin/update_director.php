<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<div class="manage_page">
	<h1 style="padding: 10px">UPDATE DIRECTOR</h1>

<?php
	
	$id=$_GET['id'];
	$image=$_GET['director_photo'];
	$query="select * from director where director_id=$id";
	$res=mysqli_query($con,$query);	
	$row=mysqli_fetch_array($res);
?>


<style type="text/css">

	nav .active3{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>


<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td><h3>Director Name :</h3> </td>
			<td>
				<input type="text" name="name" value="<?php echo $row['director_name']; ?>">
			</td>
		</tr>

		<tr>
			<td><h3>Director Gender :</h3> </td>
			<td>
				<input <?php if($row['director_gender']=='Male'){ echo "checked";} ?> type="radio" name="gender" value="Male">Male
		 		<input <?php if($row['director_gender']=='Female'){ echo "checked";} ?> type="radio" name="gender" value="Female">Female
		 	</td>
		</tr>

		<tr>
			<td><h3>Active :</h3></td>
			<td>
				<input <?php if($row['Active']=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
				<input <?php if($row['Active']=="No") {echo "checked";}?> type="radio" name="active" value="No">No	
			</td>
		</tr>

		<tr>
			<td><h3>Current Image :</h3></td>
			<td>
				<?php
					if($row['director_photo']!="")
					{
				?>
					<img src="<?php echo $row['director_photo']; ?>" alt="" width="200">
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
			<td><h3>New Image :</h3></td>
			<td>
				<input type="file" name="image">
			</td>
		</tr>
	</table>

		<input type="hidden" name="id" value="<?php echo $row['director_id'];?>">
		<input type="hidden" name="oldimage" value="<?php echo $row['director_photo']; ?>">

		<input type="submit" name="Update" value="Update" class="add_button">
	
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
				$destination="../Images/Director/".$filename;
				move_uploaded_file($filepath,$destination);
			}

		}
		else
		{
			$destination=$oldimage;
		}

		$query="update director set director_name='$name',director_gender='$gender',active='$active',director_photo='$destination' where director_id=$id";

		$res=mysqli_query($con,$query);


		if($res==true)
		{
			$_SESSION['update']="<script>alert('Updated Successfully');</script>";
			header("location:".$siteurl."admin/manage_director.php");
		}
		else
		{
			$_SESSION['update']="<scrpit>alert('Failed to Update');</script>";
			header("location:".$siteurl."admin/manage_director.php");
		}
	}
?>

<?php
	include '../templete/footer.php'
?>