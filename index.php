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
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard/dashboard.css" rel="stylesheet">
  </head>

  <body>
		<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<h1>TerraWorld</h1>
				<ul class="nav nav-sidebar" id="myTabs">
					<li class="active"><a href="#übersicht">Übersicht <span class="sr-only">(current)</span></a></li>
					<li><a href="#steuerung">Steuerung</a></li>
					<li><a href="#terrarien">Terrarien</a></li>
					<li><a href="#sensoren">Sensoren</a></li>
					<li><a href="#geräte">Geräte</a></li>
					<li><a href="#zeiten">Zeiten</a></li>
					<li><a href="#kameras">Kameras</a></li>
					<li><a href="#port">Import/Export</a></li>
				</ul>
			</div>
			<div class="col-md-10 col-md-offset-2 main">
				<div class="tab-content" id="myTabContent"> 
					<div class="tab-pane fade active in" id="übersicht">
						<p>
							<?php
								contentUebersicht();
							?>
						</p>
					</div>
					<div class="tab-pane fade" id="steuerung">
						<?php
								geraeteControl();
							?>
					</div>
					<div class="tab-pane fade" id="geräte">
						<?php
								contentGeraete();
							?>
					</div>
					<div class="tab-pane fade" id="terrarien"> 
						<p>
							<?php
								contentTerrarien();
							?>
							
						</p>
					</div>
					<div class="tab-pane fade" id="sensoren">
						<p>
							<?php
								contentSensoren();
							?>
						</p>
					</div>
					<div class="tab-pane fade" id="zeiten">
						<p>
							<?php
								contentZeiten();
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
							<h3>Import/Export <button type="button" id="importButton"class="btn btn-default"><span class="glyphicon glyphicon-import" ></span></button> <button type="button" id="exportButton"class="btn btn-default"><span class="glyphicon glyphicon-export" ></span></button></h3>
							<pre id="portArea"></pre>
						</p>
					</div>
				</div>
				
				
			</div>
		</div>

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
