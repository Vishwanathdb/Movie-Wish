<?php
	include '../user/user_header.php';
?>

<style>
	
	.active5{
		background-color: #1e90ff;
	}

</style>


<section class="main">
	<div class="container">
		
		<?php

			$query="CALL `display_movies`();";
			$res=mysqli_query($con,$query);
			if($res)
			{
				while($row=mysqli_fetch_array($res))
				{
					?>
						<div class="sub-container">
							<a href="../user/movie_details.php?id=<?php echo $row['movie_id']; ?>">
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