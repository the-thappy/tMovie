<?php
$time_start = microtime(true);
include 'code/db.php';
$id = $_GET["id"];
if(file_exists("./cache/" . $id)) {
$response = file_get_contents("./cache/" . $id);
}
else {
$url = "https://api.themoviedb.org/3/movie/".  $id . "?api_key=" . $api_key;
$response = file_get_contents($url);
file_put_contents("./cache/" . $id,  $response);
}
$array = json_decode($response, true);
$poster = $configArray["images"]["secure_base_url"] . $configArray["images"]["poster_sizes"][4] . $array["poster_path"];
$backdrop = $configArray["images"]["secure_base_url"] . $configArray["images"]["backdrop_sizes"][2] . $array["backdrop_path"];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'code/head.php'; ?>
		<title><?php echo $array["title"]; ?></title>
	</head>
	<style>
		.backdrop {
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center;
				object-fit: cover;
				border-radius: 0px;
				width: 100%;
				/* height: 720px; */
				/* height: 95vh; */
				/* max-height: 800px; */
	}
	.poster {
	}
	.title {
		font-family: ;
		font-weight: bold;
	}
	.year {
		font-weight: lighter;
	}
	</style>
	<body>
		<?php include './code/navbar.php'; ?>
		<img src="<?php echo $backdrop; ?>" alt="Backdrop" class="backdrop"  width="100%">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 offset-lg-1 col-md-5 col-sm-7 col-xs-12">
				<br>
					<div class="card">
						<img src="<?php echo $poster; ?>" class="poster img-fluid">
					</div>
				</div>
				<div class="col-lg-6 col-md-7 col-sm-5 col-xs-6">
					<br>
					<h1 class="title"><?php echo strtoupper($array["title"]); ?> <small class="year">(<?php echo substr($array["release_date"], 0, 4); ?>)</small></h1>
					<span class="badge blue"><i class="fa fa-star"></i> Ratings: <?php echo $array["vote_average"]; ?></span>
					<br><br>
					<h3>Overview</h3>
					<p class="text-justify"><?php echo $array["overview"]; ?></p>
					<?php for ($j=0; $j < sizeof($array["genres"]); $j++) {	?>
					<span class="badge grey"><?php echo $array["genres"][$j]["name"]; ?></span>
					<?php } ?>
					<br><br>
					<button class="btn btn-primary btn-block">Buy Online</button>
					<button class="btn btn-success btn-block">Add to Favorites</button>
					<button class="btn btn-primary btn-block">Add to Watchlist</button>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 offset-lg-2 offset-md-2 offset-sm-1">
					<br>
					<div class="embed-responsive embed-responsive-16by9">
						<!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/PjGkVCAo8Fw" allowfullscreen></iframe> -->
						<!-- 3QCJTbHU60U -->
						<?php
						$url = "https://api.themoviedb.org/3/movie/".  $id . "/videos?api_key=" . $api_key . "&language=en-US";
						$response = file_get_contents($url,  $response);
						$array = json_decode($response, true);
						?>
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $array["results"][0]["key"]; ?>" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<br>
		<?php include 'code/scripts.php'; ?>
		<?php
		$time_end = microtime(true);
		$execution_time = ($time_end - $time_start) / 60;

		echo "<p>Script took " . $execution_time . " seconds to execute.</p>";
		?>
		<br><br><br>
	</body>
</html>
