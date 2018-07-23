<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'code/head.php'; ?>
		<title>Log In</title>
	</head>
	<body>
		<?php include './code/navbar.php'; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<br>
					<h2>Log In</h2>
					<br>
					<form action="./code/login.php" method="POST">
						<div class="md-form">
							<i class="fa fa-user prefix"></i>
							<input type="text" id="form2" class="form-control" name="user">
							<label for="form2">User Name</label>
						</div>
						<div class="md-form">
							<i class="fa fa-asterisk prefix"></i>
							<input type="password" id="form10" class="form-control" name="pass">
							<label for="form10">Password</label>
						</div>
						<button class="btn btn-block btn-primary">Log In</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	<?php include 'code/scripts.php'; ?>
</html>