<?php
function contentZeiten()
{
	?>
		<h2>Zeiten</h2>
	<?php
	zeitenTables();
	zeitenModal();
}
function zeitenTables()
{
	$jsonfile = file_get_contents('json/terra.json');
	$json = json_decode($jsonfile, true); // decode the JSON into an associative array
	foreach ($json as $terra)
	{
		echo '<h3>'.$terra['title'].'</h3><br>';
		foreach ($terra['geraete'] as $geraet)
		{
			echo '<h4>'.$geraet['title'].'</h4><br>';
			echo 	'<table class="table" nummer="'.$geraet['id'].'">
						<caption><h3>'.$geraet['title'].'  <button type="button" id="'.$geraet['id'].'" class="btn btn-default" data-toggle="modal" data-target="#zeit"><span class="glyphicon glyphicon-plus" ></span></button></h3></caption>
						<thead>
							<th>#</th>
							<th>An</th>
							<th>Aus</th>
							<th>Option</th>
						</thead>
						<tbody>';
							foreach($geraet['schaltung'] as $schaltung)
							{
								echo '<tr><td key="id">'.$schaltung['id'].'</td><td key="on">'.$schaltung['on'].'</td><td key="off">'.$schaltung['off'].'</td><td key="options"><span class="glyphicon glyphicon-cog manipulateItem" itemType="zeit"></span> <span class="glyphicon glyphicon-trash deleteItem" itemType="zeit"></span></td></tr>';
							}
						echo '</tbody>
				</table>';
		}
		echo '<hr>';
	};
}

function zeitenModal()
{
?>
	<div class="modal fade" id="zeit" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Zeit hinzufügen</h4>
				</div>
				<div class="modal-body" id="zeitBody">
					<label>ID:</label>
					<input type="text" class="form-control modalInput" key="id" id="zeitenID" placeholder="wird automatisch vergeben" disabled>
					<label>An:</label>
					<input type="text" class="form-control modalInput" key="on" id="zeitenAn" placeholder="An">						
					<label>Aus:</label>
					<input type="text" class="form-control modalInput" key="off" id="zeitenAus" placeholder="Aus">
				</div>
				<div class="modal-footer">
					<div class="statusmeldung" id="zeitenstatusmeldung"></div>
					<button type="button" class="btn btn-primary saveItem" id="saveZeiten" itemType="zeit">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>