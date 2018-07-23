<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary stylish-color fixed-topp">
	<div class="container">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx12" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="./">TMDB tHappy</a>
		<div class="collapse navbar-collapse" id="collapseEx12">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item activa">
					<a class="nav-link waves-effect waves-light" href="./">&nbsp;&nbsp;&nbsp;<i class="fa fa-home fa-lg fa-fw prefix"></i> Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./search.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-search fa-lg prefix fa-fw"></i> Search</a>
				</li>
				<?php 
				session_start();
				if (isset($_SESSION["user"])) {
				 ?>
				<li class="nav-item">
					<a class="nav-link">&nbsp;&nbsp;&nbsp;<i class="fa fa-tv prefix fa-lg fa-fw"></i> Watch List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;<i class="fa fa-star fa-lg fa-fw prefix"></i> Favs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./code/logout.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-in fa-fw fa-lg prefix"></i> Log Out</a>
				</li>
				<?php }
				else {
				 ?>
				<li class="nav-item">
					<a class="nav-link" href="./user.php">&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-in fa-lg fa-fw prefix"></i> Log In</a>
				</li>
				<?php } ?>
			</ul>
			<!--
			<form class="form-inline waves-effect waves-light">
			<input class="form-control" type="text" placeholder="Search">
			</form>
			-->
		</div>
	</div>
</nav>
<!--/.Navbar-->
