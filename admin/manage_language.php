<?php
	include '../templete/header.php';
	include '../templete/checker.php';
?>


<?php

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

	nav .active4{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>

<div class="manage_page">
	<h1 style="padding: 10px;">MANAGE LANGUAGE</h1>
	<a href="add_language.php"> <button class="add"><b>Add Language</b></button></a>
	<br><br><br><br>

	<table>

		<tr>
			<th>SL NO.</th>
			<th>LANGUAGE ID</th>
			<th>NAME</th>
			<th>PHOTO</th>
			<th>ACTIVE</th>	
			<th>ACTION</th>
		</tr>

		<tr>
			<?php
				$query="select * from display_language;";
				$res=mysqli_query($con,$query);
				$count=1;
				while($row=mysqli_fetch_array($res))
				{
			?>
			<td><?php echo $count; ?></td>
			<td><?php echo $row['language_id']; ?></td>
			<td><?php echo $row['language_name']; ?></td>
			<td>
				<?php
					if($row['language_photo']=="")
					{
						echo "NO IMAGE FOUND<br>";
				?>

				<?php
					}
					else
					{
				?>

						<img src="<?php echo $row['language_photo'] ?>" width="100px" alt="NO IMAGE FOUND">
				<?php
					}
				?>
			</td>
			<td><?php echo $row['Active'];?></td>
			
			<td><a href="update_language.php?id=<?php echo $row['language_id']; ?>"> <img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/35-512.png" width="40" height="40" title="Edit"></a></td>

			<td><a href="delete_language.php?id=<?php echo $row['language_id']; ?>& language_photo=<?php echo $row['language_photo'];?>"> <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-512.png" alt="" width="40" height="40" title="Delete"></a></td>

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