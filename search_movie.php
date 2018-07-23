<?php
include 'code/db.php';
$q = strtolower(str_replace(" ", "+", $_GET["q"]));
$qSpace = str_replace("+", " ", $q);
if(isset($_GET["page"]))
	$page = $_GET["page"];
else
	$page = 1;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/mdb.min.css" rel="stylesheet">
		<title><?php echo ucfirst($_GET["q"]); ?></title>
		<link rel="manifest" href="manifest.json">

	</head>
	<body>
		<?php include './code/navbar.php'; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<br>
					<form action="search_movie.php" method="GET">
						<div class="md-form">
							<i class="fa fa-search prefix"></i>
							<input type="text" id="form2" class="form-control" name="q" value="<?php echo $qSpace; ?>">
							<button class="btn btn-primary btn-block">Search</button>
							<label for="form2">Search for a Movie</label>
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
				<?php
				if (file_exists("./cache/" . $q . $page)) {
					$response = file_get_contents("./cache/" . $q . $page);
				}
				else {
				$url = "https://api.themoviedb.org/3/search/movie/" . "?api_key=" . $api_key . "&query=" . $q . "&page=" . $page;
				$response = file_get_contents($url);
				file_put_contents("./cache/" . $q . $page, $response);	
				}
				$array = json_decode($response, true);

				for ($i=0; $i < min($array["total_results"], 20); $i++) {
				$img_poster_path = $configArray["images"]["base_url"] . $configArray["images"]["poster_sizes"][5] . $array["results"][$i]["poster_path"];
					$title = $array["results"][$i]["title"];
					$id = $array["results"][$i]["id"];
					$overview = $array["results"][$i]["overview"];
				?>
				<div class="col-lg-3 col-md-4 col-xs-4 col-sm-6">
					<div class="card">
						<div class="view overlay hm-white-slight">
							<a href="<?php echo "./movie.php?id=" . $id ; ?>">
								<img src="<?php echo $img_poster_path ?>" alt="" class="">
								<div class="mask waves-effect waves-light"></div>
							</a>
						</div>
						<div class="card-block">
							<h4 class="card-title"><?php echo $title; ?></h4>
							<p class="card-text" style="padding-top: 10px;"><?php //echo $overview; ?></p>
							<a href="<?php echo "./movie.php?id=" . $id ; ?>" class="btn btn-blue-grey btn-block">More Info</a>
						</div>
					</div>
					<br>
				</div>
				<?php } ?>
				<div class="col-md-2 offset-md-5 col-sm-4 offset-sm-4 col-xs-4 offset-xs-4">
							<nav>
			<ul class="pagination">
				<?php
				for ($nav=1; $nav <= min($array["total_pages"], 5); $nav++) {
				?>
				<li class="page-item <?php if($page == $nav) echo "active"?>"><a class="page-link" href="./search_movie.php?q=<?php echo $q; ?>&page=<?php echo $nav; ?>"
				><?php echo $nav ?></a></li>
				<?php } ?>
			</ul>
		</nav>
				</div>
			</div>
		</div>
		<br>
<?php include 'code/scripts.php'; ?>
</html>
