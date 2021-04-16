<?php
	include '../templete/checker.php';
?>


<?php
	if(isset($_SESSION['fail']))
	{
		echo $_SESSION['fail'];
		unset($_SESSION['fail']);
	}


	if(isset($_SESSION['success']))
	{
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	}
?>


<header class="header">
		<img src="https://image.shutterstock.com/image-illustration/movie-reviews-isolated-on-special-260nw-1152605072.jpg" alt="" align="left">
		MOVIE-WISH <sub style="font-size: 16px">(ADMIN PAGE)</sub>
</header>

<link rel="stylesheet" href="styling.css">


<div class="manage_page">
	<br>
	<h1 style="padding: 10px;">ADD MOVIE CAST</h1>

	<form action="" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td><h3>Enter the artist id :</td>
				<td>
					<input type="text" name="artist" placeholder="MUST BE A VALID ID" required> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Enter the movie id:</td>
				<td>
					<input type="number" name="movie" placeholder="MUST BE A VALID ID" required >
				</td>
			</tr>

			<tr>
				<td><h3>Active :</td>
				<td>
					 <input type="radio" name="active" value="Yes" required>Yes 
					 <input type="radio" name="active" value="No" required>No</h3>
				</td>
			</tr>
		
		<br>
		
		</table>
		
		<input type="submit" value="Add" name="Add" class="add_button">

	</form>
	
</div>

<?php

	if(isset($_POST['Add']))
	{

		$artist=$_POST['artist'];
		$movie=$_POST['movie'];
		$active=$_POST['active'];

		$query="insert into movie_cast set artist_id=$artist,movie_id=$movie,active='$active'";

		$res=mysqli_query($con,$query);

		header("location:".$siteurl."admin/add_movie_cast.php");

		if($res==true)
		{
			$_SESSION['success']="<script>alert('Successfully Added');</script>";
			header("location:".$siteurl."admin/add_movie_cast.php");
		}
		else
		{
			$_SESSION['fail']="<script>alert('Failed to Add');</script>";
			header("location:".$siteurl."admin/add_movie_cast.php");
		}
	}
?>


<?php
	include '../templete/footer.php';
?>