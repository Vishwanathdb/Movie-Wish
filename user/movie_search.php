<?php
	include '../user/user_header.php';
?>


<section class="main">
	<div class="container">


		<?php

			if(isset($_POST['search']))
			{
				$keyword=$_POST['keyword'];
			

				$query="select * from movies where active='Yes' and (description like '%$keyword%' or movie_name like '%$keyword%') order by movie_name asc;";
				$res=mysqli_query($con,$query);

				$count=mysqli_num_rows($res);

				if($count==0)
				{
		?>
					<center><h1>Sorry !!</h1>
					<img src="https://cdni.iconscout.com/illustration/premium/thumb/search-result-not-found-2130355-1800920.png" alt="">
					<h1>No Movie Found</h1></center>
		<?php
				}
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
			}
		?>

	</div>
</section>

<?php
	include '../user/user_footer.php';
?>