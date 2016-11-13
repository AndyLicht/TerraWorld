<?php
function contentTerrarien($json)
{
	?>
		<h3>Terrarien <button type="button" id="addTerra" class="btn btn-default" data-toggle="modal" data-target="#terrarium"><span class="glyphicon glyphicon-plus" ></span></button></h3>
	<?php
	terraTable($json);
	terrariumModal();
}
function terraTable($json)
{
	?>
	<table class="table">
	<thead>
		<th>#</th>
		<th>Bezeichnung</th>
		<th>Beschreibung</th>
		<th>Option</th>
	</thead>
	<tbody id="terraBody">
	<?php
		foreach ($json as $terra)
		{
			echo '<tr><td key="id">'.$terra['id'].'</td><td key="title">'.$terra['title'].'</td><td key="description">'.$terra['description'].'</td><td key="options"><span class="glyphicon glyphicon-cog manipulateItem" itemType="terrarium"></span> <span class="glyphicon glyphicon-trash deleteItem" itemType="terrarium"></span></td></tr>';
		};
	?>
	</tbody>
	</table>
	<?php
}

function terrariumModal()
{
?>
	<div class="modal fade" id="terrarium" tabindex="-1" role="dialog" aria-labelledby="Terrarium hinzufügen">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Terrarium hinzufügen</h4>
				</div>
				<div class="modal-body" id="terrariumBody">
					<label>ID:</label>
					<input type="text" class="form-control modalInput" key="id" id="terraID" placeholder="wird automatisch vergeben" disabled>
					<label>Bezeichnung:</label>
					<input type="text" class="form-control modalInput" key="title"id="terraBezeichnung" placeholder="Bezeichnung">
					<label>Beschreibung:</label>
					<input type="text" class="form-control modalInput" key="description" id="terraBeschreibung" placeholder="Beschreibung">
				</div>
				<div class="modal-footer">
					<div class="statusmeldung" id="terrastatusmeldung"></div>					
					<button type="button" class="btn btn-primary saveItem" id="saveTerra" itemType="terrarium">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>