<?php
	include '../templete/checker.php';
?>

<?php
		$id=$_GET['id'];
		$image=$_GET['artist_photo'];
		if($image!="")
		{
			unlink($image);
		}

		$query="delete from artist where artist_id=$id;";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['delete']="<script>alert('Successfully Deleted');</script>";
			header("location:".$siteurl."admin/manage_artist.php");
		}
		else
		{
			$_SESSION['delete']="<script>alert('Failed to Delete');</script>";
			header("location:".$siteurl."admin/manage_artist.php");
		}
?>

