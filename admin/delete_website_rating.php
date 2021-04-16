<?php
	include '../templete/checker.php';
?>

<?php
		$id=$_GET['id'];

		$query="delete from rate_us where viewer_id='$id';";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['delete']="<script>alert('Successfully Deleted');</script>";
			header("location:".$siteurl."admin/website_rating.php");
		}
		else
		{
			$_SESSION['delete']="<script>alert('Failed to Delete');</script>";
			header("location:".$siteurl."admin/website_rating.php");
		}
?>

