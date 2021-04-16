<?php
	include '../templete/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MOVIE-WISH</title>
	<link rel="stylesheet" href="style.css??v=<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600&family=Oswald:wght@500&display=swap" rel="stylesheet">

</head>

<style type="text/css">
		.search{
			/*width: 900px;*/
		}

		.search input{
			margin-right: auto;
			margin-left: auto;
			width: 500px;
			padding: 10px;
			border-radius: 30px;
			text-align: center;
			background-color: #2f3542;
			border-color: #1e90ff;
		}
</style>


<body>

	<header>
		<img src="../Images/Admin/logo.jpg" alt="" align="left">
		<h1>MOVIE-WISH</h1>
		<!-- <hr> -->
		<form action="../user/movie_search.php" method="POST" >
			<div class="search"><h2 ><input type="text" name="keyword" placeholder="Type something to search a movie" >
				<input type="submit" value="search" name="search" style="width: 100px;background-color: #1e90ff"></h2></div>
		<!-- <hr> -->
		</form>
		<br>
	</header>


	<nav>
		
		<ul>
			<li><a href="index.php" class="active1">Home</a></li>
			<li><a href="language.php" class="active2">Language</a></li>
			<li><a href="artist.php" class="active3">Actor/Actress</a></li>
			<li><a href="director.php" class="active4">Director</a></li>
			<li><a href="movie.php" class="active5">Movie</a></li>
			<li><a href="rate_us.php" style="float: right" class="active6">Rate Us</a></li>
		</ul>


	</nav>
