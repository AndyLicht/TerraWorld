<?php
function contentSensoren($json)
{
	?>
		<h3>Sensoren</h3>
	<?php
	sensorenTables($json);
	sensorenModal();
}
function sensorenTables($json)
{
	foreach ($json as $terra)
	{
		echo 	'<table class="table" nummer="'.$terra['id'].'">
					<caption><h3>'.$terra['title'].'  <button type="button" id="'.$terra['id'].'" class="btn btn-default" data-toggle="modal" data-target="#sensor"><span class="glyphicon glyphicon-plus" ></span></button></h3></caption>
					<thead>
						<th>#</th>
						<th>Bezeichnung</th>
						<th>Nummer</th>
						<th>Option</th>
					</thead>
					<tbody>';
					foreach($terra['sensoren'] as $sensor)
					{
						echo '<tr><td key="id">'.$sensor['id'].'</td><td key="title">'.$sensor['title'].'</td><td key="number">'.$sensor['number'].'</td><td key="options"><span class="glyphicon glyphicon-cog manipulateItem" itemType="sensor"></span> <span class="glyphicon glyphicon-trash deleteItem" itemType="sensor"></span></td></tr>';
					}
		echo 		'</tbody>
				</table>';
	};
}

function sensorenModal()
{
?>
	<div class="modal fade" id="sensor" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Sensor hinzufügen</h4>
				</div>
				<div class="modal-body" id="sensorBody">
					<label>ID:</label>
					<input type="text" class="form-control modalInput" id="sensorenID" key="id" placeholder="wird automatisch vergeben" disabled>
					<label>Bezeichnung:</label>
					<input type="text" class="form-control modalInput" id="sensorenBezeichnung" key="title" placeholder="Bezeichnung">
					<label>Nummer:</label>
					<input type="text" class="form-control modalInput" id="sensorenNummer" key="number"/>
				</div>
				<div class="modal-footer">
					<div class="statusmeldung" id="sensorenstatusmeldung"></div>
					<button type="button" class="btn btn-primary saveItem" id="saveSensoren" itemType="sensor">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>