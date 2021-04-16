<?php
	include '../user/user_header.php';
?>

<style>
	
	.active6{
		background-color: #1e90ff;
	}

	section{
		background-image: url('../Images/Admin/logo.jpg');
		background-size: 700px 650px;
		background-repeat: no-repeat;
	}

</style>

<section >
<div class="rate">

		<div class="sub-rate">
			
				<fieldset style="padding: 10px;">
					<legend><h1 style="color: black;">Rate Us :</h1></legend>

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
							<input type="number" name="rating" placeholder="Rate Us out of 10" required step="any">
						<br>
						<br>
							<h3>Comment :</h3>
							<textarea name="comment"cols="30" rows="10" style="color: black;"></textarea>
						<br>

						<input type="submit" name="submit" value="Submit" class="add_button" style="width: 20%;">
					</form>
				</fieldset>

		</div>
	
</div>
</section>



<?php

	if(isset($_POST['submit']))
	{
		$email_id=$_POST['email'];
		$name=$_POST['name'];
		$rating=$_POST['rating'];
		$comment=$_POST['comment'];

		$query="select * from rate_us where viewer_id='$email_id';";

		$check=mysqli_query($con,$query);

		$count=mysqli_num_rows($check);

		if($count==1)
		{
			$query="update rate_us set rating=$rating,comment='$comment' where viewer_id='$email_id';";

			$res=mysqli_query($con,$query);

			if($res==true)
			{
				$_SESSION['success']='<script>alert("Thanks For Rating Us");</script>';
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
			$query="insert into rate_us set viewer_id='$email_id',viewer_name='$name',rating=$rating,comment='$comment';";

			$res=mysqli_query($con,$query);

			if($res==true)
			{
				$_SESSION['success']='<script>alert("Thanks For Rating Us");</script>';
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