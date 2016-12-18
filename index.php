<?php
	include 'php/uebersichtContent.php';
	include 'php/terrarienContent.php';
	include 'php/geraeteContent.php';
	include 'php/sensorenContent.php';
	include 'php/zeitenContent.php';
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Tim Balschmiter">
    <link rel="icon" href="../../favicon.ico">

    <title>TerraWorld v3.0</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard/dashboard.css" rel="stylesheet">
    <link href="css/custom/custom.css" rel="stylesheet">
  </head>

  <body>
  <?php
	if(strpos(PHP_OS, 'WIN') !== false)
	{
		$jsonfile = file_get_contents('json/terra.json');
		$json = json_decode($jsonfile, true); // decode the JSON into an associative array
	}
	else
	{	
		$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
		$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
		$requester->connect("tcp://127.0.0.1:5000");
		$requester->send("i");
		$reply = $requester->recv();
		$json = json_decode($reply, true);
	}
  ?>
	<!--<div class="container-fluid">-->
		<div class="row">
			<div class="col-md-2" id="menuContainer">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<div class="panel-heading"><h2>TerraWorld</h2></div>
						<ul class="nav nav-sidebar" id="myTabs">
							<li class="active"><a href="#übersicht">Übersicht <span class="sr-only">(current)</span></a></li>
							<li><a href="#steuerung">Steuerung</a></li>
							<li><a href="#terrarien">Terrarien</a></li>
							<li><a href="#sensoren">Sensoren</a></li>
							<li><a href="#geraete">Geräte</a></li>
							<li><a href="#zeiten">Zeiten</a></li>
							<li><a href="#kameras">Kameras</a></li>
							<li><a href="#port">Import/Export</a></li>
						</ul>
					</div>
				</nav>
				<div>
				Version 3.0<br>
				Tim Balschmiter
				</div>
			</div>
			<div class=" col-md-9 main">
				<div class="tab-content" id="myTabContent"> 
					<div class="tab-pane fade active in" id="übersicht">
						<p>
							<?php
								contentUebersicht($json);
							?>
						</p>
					</div>
					<div class="tab-pane fade" id="steuerung">
						<?php
							geraeteControl($json);
						?>
					</div>
					<div class="tab-pane fade" id="geraete">
						<?php
							contentGeraete($json);
						?>
					</div>
					<div class="tab-pane fade" id="terrarien">
						<?php
							contentTerrarien($json);
						?>
					</div>
					<div class="tab-pane fade" id="sensoren">
						<p>
							<?php
								contentSensoren($json);
							?>
						</p>
					</div>
					<div class="tab-pane fade" id="zeiten">
						<p>
							<?php
								contentZeiten($json);
							?>
						</p>
					</div>
					<div class="tab-pane fade"id="kameras">
						<p>
							<h3>Kameras</h3>
						</p>
					</div>
					<div class="tab-pane fade"id="port">
						<p>
							<h3>Import/Export <button type="button" id="importButton"class="btn btn-default"><span class="glyphicon glyphicon-import" ></span></button> <button type="button" id="exportButton"class="btn btn-default"><span class="glyphicon glyphicon-export" ></span></button> <button type="button" id="importDefault" class="btn btn-default"><span class="glyphicon glyphicon-folder-open" ></span></button> <button type="button" id="exportDefault"class="btn btn-default"><span class="glyphicon glyphicon-folder-close" ></span></button></h3>
							<textarea id="portArea"></textarea>
						</p>
					</div>
				</div>  
			</div>
		</div>
	<!--</div>-->

				
		

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/custom/variables.js"></script>
		<script src="js/jquery/jquery-3.1.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap/bootstrap.min.js"></script>
		<script src="js/bootstrap-switch/bootstrap-switch.min.js"></script>
		<script src="js/custom/custom.js"></script>
		<script src="js/custom/manager.js"></script>
	</body>
</html>
