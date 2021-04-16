<?php
	include '../user/user_header.php';
?>

<style>
	
	.active2{
		background-color: #1e90ff;
	}

</style>


<section class="main">
	<div class="container">
		
		<?php

			$query="CALL `display_language`();";
			$res=mysqli_query($con,$query);
			if($res)
			{
				while($row=mysqli_fetch_array($res))
				{
					?>
					<a href="../user/movie_based_language.php?id=<?php echo $row['language_id'];?>">
						<div class="sub-container">
							
							<p><?php echo $row['language_name'];?></p>
							<img src="<?php echo $row['language_photo'];?>">

						</div>
					</a>

					<?php
				}
			}
		?>
	</div>
</section>

<?php
	include '../user/user_footer.php';
?>