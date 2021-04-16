<?php
	include '../user/user_header.php';
?>

<?php
	
	$id=$_GET['id'];

	$query="select  m.movie_id,m.movie_name,m.movie_photo,l.language_name,d.director_name,m.movie_photo,m.release_date,m.movie_trailer,m.movie_plot,m.movie_collection,m.imdb_rating,m.viewer_rating from movies m,language l,director d where m.movie_director_id=d.director_id and m.movie_language_id=l.language_id and m.active='Yes' and m.movie_id=$id;";

	$res=mysqli_query($con,$query);

	$row=mysqli_fetch_array($res);
?>


<h1 style="background-color: #1e90ff;text-align: center;color: black;padding: 10px;"><?php echo $row['movie_name'];?> : </h1>
<div class="grid-container">
	

	<div class="grid-item-1"><iframe width="800px" height="500px"  src="<?php echo $row['movie_trailer'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
	
	<div class="grid-item-2"><img src="<?php echo $row['movie_photo'];?>" style="width:100%; height: 100%;"></div>

	<div class="grid-item-3">&#160 Language : <?php echo $row['language_name'];?></div>

	<div class="grid-item-3">&#160 Release Date : <?php echo $row['release_date'];?></div>

	<div class="grid-item-3">&#160 Director : <?php echo $row['director_name'];?></div>

	<div class="grid-item-3">&#160 Box Office (in Million USD) : <?php if($row['movie_collection']!=0){ echo $row['movie_collection'];} else{echo '---';}?></div>

	<div class="grid-item-3">&#160 IMDb Rating : <?php echo $row['imdb_rating'];?>/10</div>

	<div class="grid-item-3">&#160 Viewer Rating : <?php if($row['viewer_rating']!=0){ echo $row['viewer_rating'];} else {echo '---';}?>/10</div>

	<div class="grid-item-3" style="text-align: justify; text-indent: 20px;"><?php echo $row['movie_plot'];?></div>

	<a href="../user/rate_movie.php?id=<?php echo $id; ?>"><input type="submit" name="rate" value="Rate this movie" class="button"></a>

</div>

<?php
	include '../user/user_footer.php';
?>