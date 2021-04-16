<?php
	include '../templete/checker.php';
?>

<?php
		$artist_id=$_GET['artist_id'];
		$movie_id=$_GET['movie_id'];

		$query="delete from movie_cast where artist_id=$artist_id and movie_id=$movie_id";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['delete']="<script>alert('Successfully Deleted');</script>";
			header("location:".$siteurl."admin/manage_movie_cast.php");
		}
		else
		{
			$_SESSION['delete']="<script>alert('Failed to Delete');</script>";
			header("location:".$siteurl."admin/manage_movie_cast.php");
		}
?>