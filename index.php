<?php include( '../track/src/class.visitorTracking.php' ); $visitors = new visitorTracking(); ?>
<?php	include 'code/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'code/head.php'; ?>
		<title>TMDB Project by tHappy</title>
	</head>
	<body>
		<?php include './code/navbar.php'; ?>
		<div class="container-fluid">
			<?php if ($_GET["loggedout"] == 1) { ?>
			<br>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Logged Out!</strong> Adios! You're now logged out. <a href="./user.php">Log back in? </a>
			</div>
			<?php } ?>
			<?php if ($_GET["loggedin"] == 1) { ?>
			<br>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Logged In!</strong> Welcome back! You're now logged in.
			</div>
			<?php } ?>
			<h2>Popular Movies</h2>
			<div class="row">
				<?php
				$movie_ids = array(49521, 550, 238, 284427, 752, 157336, 429, 278, 244786, 155, 389, 497, 13, 12477, 629, 9325);
				for ($i=0; $i < sizeof($movie_ids); $i++) {
					if(file_exists("./cache/" . $movie_ids[$i])) {
				$response = file_get_contents("./cache/" . $movie_ids[$i]);
				}
				else {
				$url = "https://api.themoviedb.org/3/movie/".  $movie_ids[$i] . "?api_key=" . $api_key;
				$response = file_get_contents($url);
				file_put_contents("./cache/" . $movie_ids[$i],  $response); // serialize unserialize implode
				}
				$array = json_decode($response, true);
				$img_poster_path = $configArray["images"]["secure_base_url"] . $configArray["images"]["poster_sizes"][3] . $array["poster_path"];
				// change X (2-6)$configArray["images"]["poster_sizes"][X]
				?>
				<div class="col-md-3 col-xs-4 col-sm-6">
					<div class="card">
						<div class="view overlay hm-white-slight">
							<a href="<?php echo "./movie.php?id=" . $array["id"] ; ?>">
								<img src="<?php echo $img_poster_path ?>" style="width:100%;">
								<div class="mask waves-effect waves-light"></div>
							</a>
						</div>
						<div class="card-block">
							<h4 class="card-title"><?php echo $array["title"]; ?></h4>
							<?php
							// genres
							for ($j=0; $j < sizeof($array["genres"]); $j++) { ?>
							<span class="badge grey">
								<?php   echo $array["genres"][$j]["name"];				?>
							</span>
							<?php } ?>
							<p class="card-text" style="padding-top: 10px;"><?php echo $array["tagline"]; ?></p>
							<a href="<?php echo "./movie.php?id=" . $array["id"] ; ?>" class="btn btn-blue-grey btn-block" >More Info</a>
						</div>
					</div>
					<br>
				</div>
				<?php }	?>
			</div>
		</div>
		<br>
		<br>
		<?php include 'code/scripts.php'; ?>
		
	</body>
</html>
