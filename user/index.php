<?php
	include '../user/user_header.php';
?>

<style>
	
	.active1{
		background-color: #1e90ff;
	}

</style>


<?php
	
	if(isset($_SESSION['success']))
	{
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	}

	if(isset($_SESSION['fail']))
	{
		echo $_SESSION['fail'];
		unset($_SESSION['fail']);
	}

	$query="select * from movies order by release_date desc;";

	$res=mysqli_query($con,$query);

	$count=0;
	$id=array();
	$image=array();
	while($count<4 && $row=mysqli_fetch_array($res))
	{
		$id[$count]=$row['movie_id'];
		$image[$count]=$row['movie_carousel'];
		$count++;
	}

?>

<h1 class="heading">RECENT RELEASE : </h1>
<br>
<br>
<div class="img-container">

	
	<figure>

		<a href="../user/movie_details.php?id=<?php echo $id[0]; ?>">
		<?php
			if($image[0]!="")
			{
		?>
		<img src="<?php echo $image[0];?>" alt="">
		<?php
			}
		?>
		</a>
		

		<a href="../user/movie_details.php?id=<?php echo $id[1]; ?>">
		<?php
			if($image[1]!="")
			{
		?>
		<img src="<?php echo $image[1];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[2];?>">
		<?php
			if($image[2]!="")
			{
		?>
		<img src="<?php echo $image[2];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[3];?>">
		<?php
			if($image[3]!="")
			{
		?>
		<img src="<?php echo $image[3];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[0];?>">
		<?php
			if($image[0]!="")
			{
		?>
		<img src="<?php echo $image[0];?>" alt="">
		<?php
			}
		?>
		</a>

	</figure>

</div>

<br>
<center><a href="../user/movie_based_release_date.php"><input type="submit" value="See More" name="seemore" class="button"></a></center>
<br>

<?php

	$query="select * from movies order by imdb_rating desc;";

	$res=mysqli_query($con,$query);

	$count=0;
	$id=array();
	$image=array();
	while($count<4 && $row=mysqli_fetch_array($res))
	{
		$id[$count]=$row['movie_id'];
		$image[$count]=$row['movie_carousel'];
		$count++;
	}

?>

<h1 class="heading">HIGH RATED(IMDb) : </h1>
<br>
<br>
<div class="img-container">

	
	<figure>

		<a href="../user/movie_details.php?id=<?php echo $id[0]; ?>">
		<?php
			if($image[0]!="")
			{
		?>
		<img src="<?php echo $image[0];?>" alt="">
		<?php
			}
		?>
		</a>
		

		<a href="../user/movie_details.php?id=<?php echo $id[1]; ?>">
		<?php
			if($image[1]!="")
			{
		?>
		<img src="<?php echo $image[1];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[2];?>">
		<?php
			if($image[2]!="")
			{
		?>
		<img src="<?php echo $image[2];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[3];?>">
		<?php
			if($image[3]!="")
			{
		?>
		<img src="<?php echo $image[3];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[0];?>">
		<?php
			if($image[0]!="")
			{
		?>
		<img src="<?php echo $image[0];?>" alt="">
		<?php
			}
		?>
		</a>

	</figure>

</div>
<br>
<center><a href="../user/movie_based_imdb.php"><input type="submit" value="See More" name="seemore" class="button"></a></center>
<br>


<?php

	$query="select * from movies order by viewer_rating desc;";

	$res=mysqli_query($con,$query);

	$count=0;
	$id=array();
	$image=array();
	while($count<4 && $row=mysqli_fetch_array($res))
	{
		$id[$count]=$row['movie_id'];
		$image[$count]=$row['movie_carousel'];
		$count++;
	}

?>

<h1 class="heading">HIGH RATED(Viewer) : </h1>
<br>
<br>
<div class="img-container">

	
	<figure>

		<a href="../user/movie_details.php?id=<?php echo $id[0]; ?>">
		<?php
			if($image[0]!="")
			{
		?>
		<img src="<?php echo $image[0];?>" alt="">
		<?php
			}
		?>
		</a>
		

		<a href="../user/movie_details.php?id=<?php echo $id[1]; ?>">
		<?php
			if($image[1]!="")
			{
		?>
		<img src="<?php echo $image[1];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[2];?>">
		<?php
			if($image[2]!="")
			{
		?>
		<img src="<?php echo $image[2];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[3];?>">
		<?php
			if($image[3]!="")
			{
		?>
		<img src="<?php echo $image[3];?>" alt="">
		<?php
			}
		?>
		</a>

		<a href="../user/movie_details.php?id=<?php echo $id[0];?>">
		<?php
			if($image[0]!="")
			{
		?>
		<img src="<?php echo $image[0];?>" alt="">
		<?php
			}
		?>
		</a>

	</figure>

</div>
<br>
<center><a href="../user/movie_based_viewer.php"><input type="submit" value="See More" name="seemore" class="button"></center></a>
<br>

<?php
	include '../user/user_footer.php';
?>