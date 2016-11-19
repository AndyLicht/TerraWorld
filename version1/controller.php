<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="TerraController">
		<meta name="author" content="Tim Balschmiter">
		<title>TerraWorld</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-switch.css">
	</head>
<?php
	//Funktion zum Laden des JSON und dem erhalten der Statusinformationen
	$status = array();
	$status[0] = 0;
	$status[1] = 0;
	$status[2] = 0;
	$status[3] = 1;
	$status[4] = 0;
	$status[5] = 0;
	$status[6] = 1;
	$status[7] = 0;
	
?>
	<body>
	<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">TerraWorld</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
				<li><a href="index.php">Info <span class="sr-only">(current)</span></a></li>
				<li class="active"><a href="controller.php">Control</a></li>
				<li><a href="manager.php">Manage</a></li>
				<li><a href="about.php">About</a></li>
		  </ul>
			<ul class="nav navbar-nav navbar-right">
				<button type="button" class="btn btn-danger navbar-btn">reload</button>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
	</nav>
	<div class="well container">
		<h2>allgemein</h2>
		<p>Tageslichtlampen: <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' checked></p>
		<p>Beregnungsanlage: <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' ></p>
	</div>
	<div class="well container">
		<h2>oberes Terrarium</h2>
		<p>Heizlampe links:  <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' checked></p>
		<p>Heizlampe rechts: <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' ></p>
		<p>Heizkabel: <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' ></p>
	</div>
	<div class="well container">
		<h2>unteres Terrarium</h2>
		<p>Heizlampe links:  <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' checked></p>
		<p>Heizlampe rechts: <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' checked></p>
		<p>Heizkabel: <input type='checkbox' data-on-color='success' data-off-color='danger' class='OnOff' ></p>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-switch.js"></script>
	<script src="js/functions.js"></script>
	</body>
</html>
