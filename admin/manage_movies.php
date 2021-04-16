<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>

<?php

	if(isset($_SESSION['delete']))
	{
		echo $_SESSION['delete'];
		unset($_SESSION['delete']);
	}	
	
?>

<style type="text/css">

	nav .active5{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>

<div class="manage_page">
	<h1 style="padding: 10px;">MANAGE MOVIES</h1>
	<a href="add_movies.php" target="_blank"> <button class="add"><b>Add Movie</b></button></a>
	<br><br><br><br>

	<table>

		<tr>
			<th>SL NO.</th>
			<th>MOVIE ID</th>
			<th>MOVIE NAME</th>
			<th>POSTER</th>
			<th>LANGUAGE</th>
			<th>DIRECTOR NAME</th>
			<th>RELEASE DATE</th>
			<th>TRAILER</th>
			<th>Carousel</th>
			<th>PLOT</th>
			<th>BOX OFFICE(in Million USD)</th>
			<th>IMDB RATING</th>
			<th>VIEWER RATING</th>
			<th>ACTIVE</th>
			<th>ACTION</th>
		</tr>

		<tr>
			<?php
				$query="select * from display_movies;";

				$res=mysqli_query($con,$query);
				$count=1;
				while($row=mysqli_fetch_array($res))
				{
			?>
			<td><?php echo $count; ?></td>
			<td><?php echo $row['movie_id'];?></td>
			<td><?php echo $row['movie_name']; ?></td>
			<td>
				<?php
					if($row['movie_photo']=="")
					{
						echo "NO IMAGE FOUND<br>";
				?>

				<?php
					}
					else
					{
				?>

						<img src="<?php echo $row['movie_photo'] ?>" width="100px" alt="NO IMAGE FOUND">
				<?php
					}
				?>
			</td>
			<td><?php echo $row['language_name']; ?></td>
			<td><?php echo $row['director_name'];?></td>
			<td><?php echo $row['release_date'];?></td>
			<td><iframe width="300"  src="<?php echo $row['movie_trailer']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>

			<td>
				<?php
					if($row['movie_carousel']=="")
					{
						echo "NO IMAGE FOUND<br>";
				?>

				<?php
					}
					else
					{
				?>

						<img src="<?php echo $row['movie_carousel'] ?>" width="100px" alt="NO IMAGE FOUND">
				<?php
					}
				?>
			</td>
				
			<td><?php echo $row['movie_plot'];?></td>
			<td><?php echo $row['movie_collection'];?> </td>
			<td><?php echo $row['imdb_rating'];?></td>
			<td><?php echo $row['viewer_rating']?></td>
			<td><?php echo $row['Active'];?></td>
				
			<td><a href="update_movies.php?id=<?php echo $row['movie_id']; ?>" target="_blank"> <img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/35-512.png" width="40" height="40" title="Edit"></a></td>

			<td><a href="delete_movies.php?id=<?php echo $row['movie_id']; ?>& movie_photo=<?php echo $row['movie_photo']?> & movie_carousel=<?php echo $row['movie_carousel'];?>"> <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-512.png" alt="" width="40" height="40" title="Delete"></a></td>

		</tr>
		
			<?php
				$count++;
				}
			?>
			
	</table>

</div>

<?php
	include '../templete/footer.php';
?>