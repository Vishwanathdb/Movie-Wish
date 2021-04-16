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

	nav .active7{
		background-color: #FC427B;
		color: #2C3A47;
	}

</style>

<div class="manage_page">
	<br><br><br><br>

	<table>

		<tr>
			<th>SL NO.</th>
			<th>VIEWER ID</th>
			<th>VIEWER NAME</th>
			<th>RATING</th>
			<th>COMMENTS</th>
			<th>DELETE</th>
		</tr>

		<tr>
			<?php
				$query="select * from display_website_rating;";
				$res=mysqli_query($con,$query);
				$count=1;
				while($row=mysqli_fetch_array($res))
				{
			?>
			<td><?php echo $count; ?></td>
			<td><?php echo $row['viewer_id']; ?></td>
			<td><?php echo $row['viewer_name']; ?></td>
			<td><?php echo $row['rating'];?></td>
			<td><?php echo $row['comment']; ?></td>

			<td><a href="delete_website_rating.php?id=<?php echo $row['viewer_id']; ?>"> <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/52-512.png" alt="" width="40" height="40" title="Delete"></a></td>

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