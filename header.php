<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Test</title>
		<link rel="stylesheet" href="css/bootstrap.css?v=1">
		<link rel="stylesheet" href="css/bootstrap-responsive.css?v=1">
	</head>
	<body>
	
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar pull-left" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-th-list"></span>
					</a>
					<a href="index.php" class="brand">Project Site</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-left">
							<li class="active"><a href="index.php">Browse</a></li>
							<li><a href="create.php">Create</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="#">Search</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
		<script src="js/bootstrap.js"></script>
		
		<div class="hero-unit">
			<h4>A central place for projects.</h4>
			<?php 
			if (logged_in() == true)	{
				include 'vote.php';
			} else {
				include 'form.php';
			}
			?>

		</div>
		