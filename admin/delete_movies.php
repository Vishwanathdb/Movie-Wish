<?php
	include '../templete/checker.php';
?>

<?php
		$id=$_GET['id'];
		$image=$_GET['movie_photo'];
		$carousel=$_GET['movie_carousel'];
		
		if($image!="")
		{
			unlink($image);
		}

		if($carousel!="")
		{
			unlink($carousel);
		}

		$query="delete from movies where movie_id=$id";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['delete']="<script>alert('Successfully Deleted');</script>";
			header("location:".$siteurl."admin/manage_movies.php");
		}
		else
		{
			$_SESSION['delete']="<script>alert('Failed to Delete');</script>";
			header("location:".$siteurl."admin/manage_movies.php");
		}
?>