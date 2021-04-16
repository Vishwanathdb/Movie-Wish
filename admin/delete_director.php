<?php
	include '../templete/checker.php';
?>

<?php
		$id=$_GET['id'];
		$image=$_GET['director_photo'];
		
		if($image!="")
		{
			unlink($image);
		}

		$query="delete from director where director_id=$id";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['delete']="<script>alert('Successfully Deleted');</script>";
			header("location:".$siteurl."admin/manage_director.php");
		}
		else
		{
			$_SESSION['delete']="<script>alert('Failed to Delete');</script>";
			header("location:".$siteurl."admin/manage_director.php");
		}
?>