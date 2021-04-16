<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>


<?php

	if(isset($_SESSION['login']))
	{
		echo $_SESSION['login'];
		$_SESSION['login']="";
	}

	if(isset($_SESSION['success']))
	{
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	}

	if(isset($_SESSION['delete']))
	{
		echo $_SESSION['delete'];
		unset($_SESSION['delete']);
	}

	if(isset($_SESSION['update']))
	{
		echo $_SESSION['update'];
		unset($_SESSION['update']);
	}		

?>

<style type="text/css">

	nav .active1{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>

<div class="manage_page">
	<h1 style="padding: 10px;">MANAGE ADMIN</h1>
	<a href="add_admin.php"> <button class="add"><b>Add Admin</b></button></a>
	<a href="update_admin_password.php"><button class="add" style="background-color: #e67e22"><b>Change My Password</b></button></a>
	
	<br><br><br><br>

	<table>

		<tr>
			<th>SL NO.</th>
			<th>EMAIL ID</th>
			<th>FIRST NAME</th>
			<th>LAST NAME</th>
			<th>ADMIN PHOTO</th>
			<th>USERNAME</th>
			<th>PHONE NO</th>
			<th>ACTION</th>
		</tr>

		<tr>
			<?php
				$query="select * from display_admin;";
				$res=mysqli_query($con,$query);
				$count=1;
				while($row=mysqli_fetch_array($res))
				{
			?>
			<td><?php echo $count; ?></td>
			<td><?php echo $row['email_id']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
			<td>
				<?php
					if($row['admin_photo']=="")
					{
						echo "NO IMAGE FOUND<br>";
				?>

				<?php
					}
					else
					{
				?>

						<img src="<?php echo $row['admin_photo'] ?>" width="100px" alt="NO IMAGE FOUND" style="border-radius: 100px;">
				<?php
					}
				?>
			</td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['phone_no'];?></td>

			<td><a href="update_admin.php?id=<?php echo $row['email_id']; ?>"> <img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/35-512.png" width="40" height="40" title="Edit"></a></td>

			<td><a href="delete_admin.php?id=<?php echo $row['email_id']; ?>& admin_photo=<?php echo $row['admin_photo'];?>"> <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-512.png" alt="" width="40" height="40" title="Delete"></a></td>

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