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

	nav .active6{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>


<div class="manage_page">
	<h1 style="padding: 10px;">MANAGE MOVIE CAST</h1>
	<a href="add_movie_cast.php" target="_blank"> <button class="add"><b>Add Movie Cast</b></button></a>
	<br><br><br><br>

	<table>

		<tr>
			<th>SL NO.</th>
			<th>MOVIE ID</th>
			<th>TITLE</th>
			<th>POSTER</th>
			<th>ARTIST ID</th>
			<th>ARTIST NAME</th>
			<th>ARTIST PHOTO</th>
			<th>ACTIVE</th>
			<th>DELETE</th>
		</tr>

		<tr>
			<?php
				$query="select * from display_movie_cast;";
				$res=mysqli_query($con,$query);
				$count=1;
				while($row=mysqli_fetch_array($res))
				{
			?>
			<td><?php echo $count; ?></td>
			<td><?php echo $row['movie_id']; ?></td>
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
				
			<td><?php echo $row['artist_id'];?></td>
			<td><?php echo $row['artist_name'];?></td>
			<td>
				<?php
					if($row['artist_photo']=="")
					{
						echo "NO IMAGE FOUND<br>";
				?>

				<?php
					}
					else
					{
				?>

						<img src="<?php echo $row['artist_photo'] ?>" width="100px" alt="NO IMAGE FOUND">
				<?php
					}
				?>
			</td>

			<td><?php echo $row['Active'];?></td>
	<!-- 
			<td><a href="update_movie_cast.php? artist_id=<?phpecho $row['artist_id']; ?>& movie_id=<?phpecho $row['movie_id'];?>" target="_blank"> <img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/35-512.png" width="40" height="40" title="Edit"></a></td> -->

			<td><a href="delete_movie_cast.php? artist_id=<?php echo $row['artist_id']; ?>& movie_id=<?php echo $row['movie_id'];?>"> <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-512.png" alt="" width="40" height="40" title="Delete"></a></td>

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