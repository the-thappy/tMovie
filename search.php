<?php include 'code/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'code/head.php'; ?>
		<title>Search</title>
	</head>
	<body>
		<?php include './code/navbar.php'; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<br>
					<form action="search_movie.php" method="GET" role="form">
						<div class="md-form">
							<i class="fa fa-search prefix"></i>
							<label for="form2">Search for a Movie</label>
							<input type="text" id="form2" class="form-control" name="q" value="<?php if(isset($q)) {echo $q;} ?>">
							<button class="btn btn-primary btn-block">Search</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br>
		<?php include 'code/scripts.php'; ?>
	</body>
</html>