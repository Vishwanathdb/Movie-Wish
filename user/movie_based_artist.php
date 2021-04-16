<?php
	include '../user/user_header.php';
?>

<?php
	$id=$_GET['id'];
?>


<section class="main">
	<div class="container">
		
		<?php

			$query="select distinct m.movie_id,m.movie_name,m.movie_photo from movies m,movie_cast mc where mc.active='Yes' and m.active='Yes' and mc.artist_id=$id and m.movie_id=mc.movie_id order by movie_name asc;";
			$res=mysqli_query($con,$query);
			if($res)
			{
				while($row=mysqli_fetch_array($res))
				{
					?>
						<div class="sub-container">
							
							<a href="../user/movie_details.php?id=<?php echo $row['movie_id'];?>">
								<p><?php echo $row['movie_name'];?></p>
								<img src="<?php echo $row['movie_photo'];?>">
							</a>

						</div>

					<?php
				}
			}
		?>
	</div>
</section>

<?php
	include '../user/user_footer.php';
?>