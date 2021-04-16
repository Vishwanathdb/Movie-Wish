<?php
	include '../user/user_header.php';
?>

<?php
	$id=$_GET['id'];
?>


<section class="main">
	<div class="container">
		
		<?php

			$query="select * from movies where active='Yes' and movie_director_id=$id order by movie_name asc;";
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