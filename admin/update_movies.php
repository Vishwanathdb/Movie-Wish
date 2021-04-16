<?php
	include '../templete/checker.php';
?>

<header class="header">
		<img src="https://image.shutterstock.com/image-illustration/movie-reviews-isolated-on-special-260nw-1152605072.jpg" alt="" align="left">
		MOVIE-WISH <sub style="font-size: 16px">(ADMIN PAGE)</sub>
</header>

<link rel="stylesheet" href="styling.css">

<div class="manage_page">
	<br>
	<h1 style="padding: 10px;">UPDATE LANGUAGE</h1>

<?php
	$id=$_GET['id'];
	$query="select * from movies where movie_id=$id";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);

	$image=$row['movie_photo'];
	$name=$row['movie_name'];
	$language=$row['movie_language_id'];
	$director=$row['movie_director_id'];
	$date=$row['release_date'];
	$plot=$row['movie_plot'];
	$collection=$row['movie_collection'];
	$imdb=$row['imdb_rating'];
	$trailer=$row['movie_trailer'];
	$carousel=$row['movie_carousel'];
	$image=$row['movie_photo'];
	$active=$row['Active'];
	$description=$row['Description'];
?>


	<form action="" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td><h3>Title:</td>
				<td>
					 <input type="text" name="name" value="<?php echo $name; ?>" required> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Language ID:</td>
				<td>
					 <input type="number" name="language" value="<?php echo $language; ?>" required></h3>
				</td>
			</tr>

			<tr>
				<td><h3>Director ID :</td>
				<td>
					<input type="number" name="director" value="<?php echo $director; ?>" required> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Release Date :</td>
				<td>
					 <input type="date" name="date" value="<?php echo $date; ?>" required> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Movie Plot :</td>
				<td>
					 <textarea  name="plot" cols="30" rows="10"><?php echo $plot; ?></textarea> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Movie Collection : (in Million USD)</td>
				<td>
					<input type="number" name="collection" step="any" value="<?php echo $collection; ?>" required> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Imdb Rating :</td>
				<td>
					<input type="number" name="imdb" step="any" value="<?php echo $imdb;?>" required> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Current Trailer :</h3></td>
				<td>
					<iframe width="300"  src="<?php echo $trailer; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td>
			</tr>


			<tr>
				<td><h3>Enter the New URL of trailer from You Tube :</td>
				<td>
					<input type="text" name="trailer"> </h3>
				</td>
			</tr>

			<tr>
				<td><h3>Movie Description :</td>
				<td>
					<textarea  name="description" cols="30" rows="10"><?php echo $description;?></textarea></h3>
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
				<td><h3>Current Poster : </h3></td>
				<td>
					<?php
					     if($image!="")
					     {
					 ?>
					 <img src="<?php echo $image; ?>" alt="" width="200">
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
				<td><h3>New Poster:</td>
				<td>
					 <input type="file" name="image"> </h3>
				</td>
			</tr>



			<tr>
				<td><h3>Current Carousel : </h3></td>
				<td>
					<?php
					     if($carousel!="")
					     {
					 ?>
					 <img src="<?php echo $carousel; ?>" alt="" width="200">
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
				<td><h3>New Carousel:</td>
				<td>
					 <input type="file" name="carousel"> </h3>
				</td>
			</tr>

		</table>

			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="oldimage" value="<?php echo $image; ?>">
			<input type="hidden" name="oldtrailer" value="<?php echo $trailer; ?>">
			<input type="hidden" name="oldcarousel" value="<?php echo $carousel;?>">
			<input type="submit" value="Update" name="Update" class="add_button">
	</form>
</div>

<?php

	if(isset($_POST['Update']))
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$language=$_POST['language'];
		$director=$_POST['director'];
		$date=$_POST['date'];
		$plot=$_POST['plot'];
		$collection=$_POST['collection'];
		$imdb=$_POST['imdb'];
		$trailer=$_POST['trailer'];
		$image=$_FILES['image'];
		$description=$_POST['description'];
		$active=$_POST['active'];
		$carousel=$_FILES['carousel'];
		$oldimage=$_POST['oldimage'];
		$oldtrailer=$_POST['oldtrailer'];
		$oldcarousel=$_POST['oldcarousel'];

		$destinationImage="";
		$destinationTrailer="";
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

			if($oldimage!="")
			{
				unlink($oldimage);
			}

			$filename=$image['name'];
			$filepath=$image['tmp_name'];
			$fileerror=$image['error'];

			if($fileerror==0)
			{
				$destinationImage="../Images/Movie/".$filename;
				move_uploaded_file($filepath,$destinationImage);
			}
		}
		else
		{
			$destinationImage=$oldimage;
		}


		if($trailer==""){
			$destinationTrailer=$oldtrailer;
		}
		else
		{
			$destinationTrailer=$trailer;
		}


		if($carousel['name']!="")
		{

			if($oldcarousel!="")
			{
				unlink($oldcarousel);
			}

			$filename=$carousel['name'];
			$filepath=$carousel['tmp_name'];
			$fileerror=$carousel['error'];

			if($fileerror==0)
			{
				$destinationCarousel="../Images/Carousel/".$filename;
				move_uploaded_file($filepath,$destinationCarousel);
			}
		}
		else
		{
			$destinationCarousel=$oldcarousel;
		}

		$query="update movies set movie_name='$name',movie_language_id=$language,movie_director_id=$director,release_date='$date',movie_plot='$plot',movie_collection=$collection,imdb_rating=$imdb,movie_trailer='$destinationTrailer',movie_carousel='$destinationCarousel',active='$active',movie_photo='$destinationImage',description='$description' where movie_id=$id;";

		$res=mysqli_query($con,$query);

		if($res==true)
		{
			$_SESSION['update']="<script>alert('Updated Successfully');</script>";
			header("location:".$siteurl."admin/endpage.php");
		}
		else
		{
			$_SESSION['update']="<script>alert('Failed to Update');</script>";
			header("location:".$siteurl."admin/endpage.php");
		}
	}
?>

<?php
	include '../templete/footer.php';
?>