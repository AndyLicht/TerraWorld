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
	//Funktion zum Laden des JSON
	$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
	$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
	$requester->connect("tcp://127.0.0.1:5000");
	$requester->send("i");
	$reply = $requester->recv();
	$json = json_decode($reply);
	$sensoren = $json->sensoren;
	var_dump($reply);
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
				<li class="active"><a href="index.php">Info <span class="sr-only">(current)</span></a></li>
				<li><a href="controller.php">Control</a></li>
				<li><a href="manager.php">Manage</a></li>
				<li><a href="about.php">About</a></li>
		  </ul>
			<ul class="nav navbar-nav navbar-right">
				<button id="reload" type="button" class="btn btn-danger navbar-btn">reload</button>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
	</nav>
	<div class="well container">
		<h2>oberes Terarium</h2>
		<div class="panel panel-default">
			<table class="table">
				<tr>
					<th></th>
					<th>Sensor 1 (links)</th>
					<th>Sensor 2 (rechts)</th>
				</tr>
				<tr>
					<td>Temperatur[°C]</td>
					<td><?php echo $sensoren[2]->sensor_oben_links->temp?></td>
					<td><?php echo $sensoren[3]->sensor_oben_rechts->temp?></td>
				</tr>
				<tr>
					<td>Luftfeuchtigkeit[%]</td>
					<td><?php echo $sensoren[2]->sensor_oben_links->luftfeuchtigkeit?></td>
					<td><?php echo $sensoren[3]->sensor_oben_rechts->luftfeuchtigkeit?></td>
				</tr>
			</table>
		</div>
	</div> 
	<div class="well container">
		<h2>unteres Terarium</h2>
		<div class="panel panel-default">
			<table class="table">
				<tr>
					<th></th>
					<th>Sensor 1 (links)</th>
					<th>Sensor 2 (rechts)</th>
				</tr>
				<tr>
					<td>Temperatur[°C]</td>
					<td><?php echo $sensoren[0]->sensor_unten_links->temp?></td>
					<td><?php echo $sensoren[1]->sensor_unten_rechts->temp?></td>
				</tr>
				<tr>
					<td>Luftfeuchtigkeit[%]</td>
					<td><?php echo $sensoren[0]->sensor_unten_links->luftfeuchtigkeit?></td>
					<td><?php echo $sensoren[1]->sensor_unten_rechts->luftfeuchtigkeit?></td>
				</tr>
			</table>
		</div>
	</div> 
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-switch.js"></script>
	<script src="js/functions.js"></script>
	</body>
</html>
