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
	<h1 style="padding: 10px;">ADD MOVIE</h1>

<form action="" method="POST" enctype="multipart/form-data">

	<table>

	<tr>
		<td><h3>Enter the movie name:</td>
		<td>
			 <input type="text" name="name" required> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the language id:</td>
		<td>
			 <input type="number" name="language" placeholder="MUST BE IN LANGUAGE TABLE" required style="width: 220px;">
		</td>
	</tr>

	<tr>
		<td><h3>Enter the director id :</td>
		<td>
			<input type="number" name="director" placeholder="MUST BE IN DIRECTOR TABLE" required style="width: 220px;"> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the release date :</td>
		<td>
			 <input type="date" name="date" required> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the movie plot :</td>
		<td>
			 <textarea  name="plot" cols="30" rows="10"></textarea> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the movie collection :(in million USD)</td>
		<td>
			<input type="number" name="collection" step="any"></h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the Imdb rating :</td>
		<td>
			<input type="number" name="imdb" step="any"> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the URL of trailer from You Tube :</td>
		<td>
			<input type="text" name="trailer"> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Enter the movie description :</td>
		<td>
			<textarea  name="description" cols="30" rows="10"></textarea></h3>
		</td>
	</tr>

	<tr>
		<td><h3>Active :</td>
		<td>
			 <input type="radio" name="active" value="Yes" required>Yes 
			 <input type="radio" name="active" value="No" required>No</h3>
		</td>
	</tr>

	<tr>
		<td><h3>Upload Poster:</td>
		<td>
			 <input type="FILE" name="image"> </h3>
		</td>
	</tr>

	<tr>
		<td><h3>Upload Carousel:</td>
		<td>
			 <input type="FILE" name="carousel"> </h3>
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

		$name=$_POST['name'];
		$language=$_POST['language'];
		$director=$_POST['director'];
		$date=$_POST['date'];
		$plot=$_POST['plot'];
		$active=$_POST['active'];
		$collection=$_POST['collection'];
		$imdb=$_POST['imdb'];
		$trailer=$_POST['trailer'];
		$carousel=$_FILES['carousel'];
		$image=$_FILES['image'];
		$description=$_POST['description'];
		$destinationposter="";
		$destinationCarousel="";

		if($collection=='')
		{
			$collection=0;
		}

		if($imdb=='')
		{
			$imdb=0;
		}

		if($image['name']!="")
		{
			$filename=$image['name'];
			$filepath=$image['tmp_name'];
			$fileerror=$image['error'];

			if($fileerror==0)
			{
				$destinationposter="../Images/Movie/".$filename;
				move_uploaded_file($filepath,$destinationposter);
			}
		}

		if($carousel['name']!="")
		{
			$filename=$carousel['name'];
			$filepath=$carousel['tmp_name'];
			$fileerror=$carousel['error'];

			if($fileerror==0)
			{
				$destinationCarousel="../Images/Carousel/".$filename;
				move_uploaded_file($filepath,$destinationCarousel);
			}
		}

		$query="insert into movies set movie_name='$name',movie_language_id=$language,movie_director_id=$director,release_date='$date',movie_plot='$plot',active='$active',movie_collection=$collection,imdb_rating=$imdb,movie_trailer='$trailer',movie_photo='$destinationposter',movie_carousel='$destinationCarousel', description='$descriptionposter';";


		//echo $query;

		$res=mysqli_query($con,$query);


		
		if($res==true)
		{
			$_SESSION['success']="<script>alert('Successfully Added');</script>";
			header("location:".$siteurl."admin/add_movies.php");
		}
		else
		{
			$_SESSION['fail']="<script>alert('Failed to add');</script>";
			header("location:".$siteurl."admin/add_movies.php");
		}
	}
?>

<?php
	include '../templete/footer.php';
?>