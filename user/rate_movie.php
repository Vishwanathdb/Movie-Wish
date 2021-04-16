<?php
	include '../user/user_header.php';
?>


<?php

	$id=$_GET['id'];

	$query="select movie_name,movie_photo,movie_carousel from movies where movie_id=$id;";

	$res=mysqli_query($con,$query);

	$row=mysqli_fetch_array($res);

	$movie_name=$row['movie_name'];
	$movie_photo=$row['movie_photo'];
	$movie_carousel=$row['movie_carousel'];

?>


<style>
	

	section{
		background-image: url(<?php echo $movie_photo; ?>);
		background-size: 620px 800px;
		background-repeat: no-repeat;
	}

</style>

<section >
<div class="rate">

		<div class="sub-rate">
			
				<fieldset style="padding: 10px;">
					<legend><h1 style="color: black;">Rate Us :</h1></legend>

							<u style="color: black"><h2 style="color: black"><?php echo $movie_name; ?> :</h2></u>
							<br>
							<img src="<?php echo $movie_carousel; ?>" alt="" style="width: 200px;">
							<form method="POST" class="min-rate">

							<h3>E-Mail :</h3>
							<input type="email" name="email" placeholder="Enter E-Mail ID" required>
						<br>
						<br>
							<h3>Name : </h3>
							<input type="text" name="name" placeholder="Enter Your Name" required>
						<br>
						<br>
							<h3>Rating :</h3>
							<input type="number" name="rating" placeholder="Rate this movie out of 10" required step="any">
						<br>
						<br>
							<h3>Comment :</h3>
							<textarea name="comment"cols="30" rows="10" style="color: black;"></textarea>
						<br>

						<input type="hidden" name="id" value="<?php echo $id;?>">

						<input type="submit" name="submit" value="Submit" class="add_button" style="width: 20%;">
					</form>
				</fieldset>

		</div>
	
</div>
</section>



<?php

	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$email_id=$_POST['email'];
		$name=$_POST['name'];
		$rating=$_POST['rating'];
		$comment=$_POST['comment'];

		$query="select * from viewer_rating where viewer_id='$email_id' and movie_id=$id;";

		$check=mysqli_query($con,$query);

		$count=mysqli_num_rows($check);

		if($count==1)
		{
			$query="update viewer_rating set rating=$rating,comment='$comment' where viewer_id='$email_id' and movie_id=$id;";

			$query1="update movies set viewer_rating=(select avg(rating) from viewer_rating where movie_id=$id) where movie_id=$id;";

			$res=mysqli_query($con,$query);

			$res1=mysqli_query($con,$query1);

			if($res==true)
			{
				$_SESSION['success']='<script>alert("Thanks For Rating");</script>';
				header('location:'.$siteurl.'user/index.php');
			}
			else
			{
				$_SESSION['fail']='<script>alert("Please Try again");</script>';
				header('location:'.$siteurl.'user/index.php');	
			}
		}
		else
		{
			$query="insert into viewer_rating set viewer_id='$email_id',viewer_name='$name',rating=$rating,movie_id=$id,comment='$comment';";

			$query1="update movies set viewer_rating=(select avg(rating) from viewer_rating where movie_id=$id) where movie_id=$id;";

			$res=mysqli_query($con,$query);

			$res1=mysqli_query($con,$query1);

			if($res==true)
			{
				$_SESSION['success']='<script>alert("Thanks For Rating");</script>';
				header('location:'.$siteurl.'user/index.php');
			}
			else
			{
				$_SESSION['fail']='<script>alert("Please Try again");</script>';
				header('location:'.$siteurl.'user/index.php');	
			}
		}

	}

?>


<?php
	include '../user/user_footer.php';
?>