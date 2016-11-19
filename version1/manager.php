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
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-datetimepicker.min.css">
	</head>
<?php
	//Funktion zum Laden des JSON
	
	$file = file_get_contents('json.txt');
	$json = json_decode($file);
	$geraete = $json->geraete;
		
	
	function printdevicetable($name)
	{
		$button = '<button class="btn btn-default deleteTime"><span class="glyphicon glyphicon-minus"></span></button><button class="btn btn-default changeTime" href="#timechange" data-toggle="modal"><span class="glyphicon glyphicon-cog"></span></button>';
		$print = null;
		foreach($GLOBALS['geraete'] as $geraet)
		{
			if ($geraet->bezeichnung == $name)
			{
				foreach ($geraet->schaltung as $schaltung)
				{
					$print = $print."<tr><td class='schaltungsid'>".$schaltung->id.'</td><td class="schaltungon">'.$schaltung->on.'</td><td class="schaltungoff">'.$schaltung->off.'</td><td>'.$button.'</td></tr>';
				}
			}
		}
		return $print;
	}
?>
	<body role="document">
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
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
						<li><a href="controller.php">Control</a></li>
						<li class="active"><a href="manager.php">Manage</a></li>
						<li><a href="about.php">About</a></li>
				  </ul>
					<ul class="nav navbar-nav navbar-right">
						<button type="button" class="btn btn-danger navbar-btn">reload</button>
					</ul>
				</div>
			</div>
		</nav>
		<div class="well container">
			<h2>allgemein</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
				Tageslichtlampen
					<button id="tageslichtlampen" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbtageslichtlampen" class="table">
				<?php echo printdevicetable('tageslichtlampen'); ?>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				Beregnungsanlage
					<button id="beregnungsanlage" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbberegnungsanlage" class="table">
					<?php echo printdevicetable('beregnungsanlage'); ?>
				</table>
			</div>
		</div>
		<div class="well container">
			<h2>oberes Terrarium</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
				Heizlampe (links)
					<button id="othzl" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>			
				</div>
				<table id="tbothzl" class="table">
					<?php echo printdevicetable('heizlampe_oben_links'); ?>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				Heizlampe (rechts)
					<button id="othzr" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbothzr" class="table">
					<?php echo printdevicetable('heizlampe_oben_rechts'); ?>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				Heizkabel
					<button id="othzk" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbothzk" class="table">
					<?php echo printdevicetable('heizkabel_oben'); ?>
				</table>
			</div>
		</div>
		<div class="well container">
			<h2>unteres Terrarium</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
				Heizlampe (links)
					<button id="uthzl" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbuthzl" class="table">
					<?php echo printdevicetable('heizlampe_unten_links'); ?>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				Heizlampe (rechts)
					<button id="uthzr" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbuthzr" class="table">
					<?php echo printdevicetable('heizlampe_unten_rechts'); ?>
				</table>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				Heizkabel
					<button id="uthzk" class="btn btn-default addTime" href="#timechange" data-toggle="modal">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table id="tbuthzk" class="table">
					<?php echo printdevicetable('heizkabel_unten'); ?>
				</table>
			</div>
		</div>
		<!--Modal-->
		<div class="modal fade" id="timechange" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>definiere neue Zeiteinstellungen</h2>
					</div>
					<div class="modal-body">
						<p>id:</p>
						<p id='modalid'></p>
						<p>von:</p>
						<div id="datetimepicker_on" class="input-append timepicker">
							<input id="modalon" data-format="hh/mm/ss" type="text"></input>
							<span class="btn btn-default add-on">
								<i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
							</span>
						</div>
						<p>bis:</p>
						<div id="datetimepicker_off" class="input-append timepicker">
							<input id="modaloff" data-format="hh/mm/ss" type="text"></input>
							<span class="btn btn-default add-on">
								<i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
							</span>
						</div>			
					</div>
					<div class="modal-footer">
						<a class="btn btn-danger" data-dismiss="modal">Abbrechen</a>
						<a id='speichernButton' class="btn btn-success" data-dismiss="modal">Speichern</a>
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-switch.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
		<script src="js/functions.js"></script>
		<script type="text/javascript">
			$('.timepicker').datetimepicker({
				pickDate: false
			});
    </script>
	</body>
</html>
