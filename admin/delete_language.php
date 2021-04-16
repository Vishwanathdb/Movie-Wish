<?php
	include '../templete/checker.php';
?>

<?php
		$id=$_GET['id'];
		$image=$_GET['language_photo'];
		
		if($image!="")
		{
			unlink($image);
		}

		$query="delete from language where language_id=$id";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['delete']="<script>alert('Successfully Deleted');</script>";
			header("location:".$siteurl."admin/manage_language.php");
		}
		else
		{
			$_SESSION['delete']="<script>alert('Failed to Delete');</script>";
			header("location:".$siteurl."admin/manage_language.php");
		}
?>