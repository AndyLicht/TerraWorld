<?php
function contentGeraete($json)
{
	?>
		<h3>Geräte</h3>
	<?php
	geraeteTables($json);
	geraeteModal();
}
function geraeteTables($json)
{
	foreach ($json as $key => $terra)
	{
		echo 	'<table class="table" terraid="'.$key.'" geraeteid="">
					<caption><h3>'.$terra['title'].'('.$key.') <button type="button" geraeteid="" terraid="'.$key.'" class="btn btn-default" data-toggle="modal" data-target="#geraet"><span class="glyphicon glyphicon-plus" ></span></button></h3></caption>
					<thead>
						<th>#</th>
						<th>Bezeichnung</th>
						<th>Art</th>
						<th>Steckdosenleiste</th>
						<th>Steckplatz</th>
						<th>Option</th>
					</thead>
					<tbody>';
					foreach($terra['geraete'] as $gkey => $geraet)
					{
						echo '<tr><td key="id">'.$gkey.'</td><td key="title">'.$geraet['title'].'</td><td key="type">'.$geraet['type'].'</td><td key="device">'.$geraet['device'].'</td><td key="number">'.$geraet['number'].'</td><td key="options"><span class="glyphicon glyphicon-cog manipulateItem" geraeteid="" terraid="'.$key.'" itemType="geraet"></span> <span class="glyphicon glyphicon-trash deleteItem" itemType="geraet"></span></td></tr>';
					}
		echo 		'</tbody>
				</table>';
	};
}

function geraeteControl($json)
{
	foreach ($json as $terra)
	{
		echo $terra['title']."<br>";
		foreach ($terra['geraete'] as $geraet)
		{
			echo '<form class="form-inline">
				<div class="form-group">
					<label for="my-checkbox">'.$geraet['title'].': </label>';
					if($geraet['title'] === "true")
					{	
						echo '<input type="checkbox" name="my-checkbox" checked>';
					}
					else
					{
						echo '<input type="checkbox" name="my-checkbox">';
					}
					echo '</div></form>';
		}
		echo "<hr>";
	}
}

function geraeteModal()
{
?>
	<div class="modal fade" id="geraet" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Gerät hinzufügen</h4>
				</div>
				<div class="modal-body" id="geraetBody">
					<label>ID:</label>
					<input type="text" class="form-control modalInput" key="id" id="geraeteID" placeholder="wird automatisch vergeben" disabled>
					<label>Bezeichnung:</label>
					<input type="text" class="form-control modalInput" key="title" id="geraeteBezeichnung" placeholder="Bezeichnung">
					<label>Art:</label>
					<select class="form-control modalInput" key="type" id="geraeteTyp">
						<option value="Heizlampe">Heizlampe</option>
						<option value="Beregnung">Beregnung</option>
						<option value="Heizmatte">Heizmatte</option>
						<option value="Tageslicht">Tageslicht</option>
					</select>
					<label>Steckdosenleiste:</label>
					<input type="text"  class="form-control modalInput" id="steckdosenleiste" key="device"/>
					<label>Steckplatz:</label>
					<select class="form-control modalInput" key="number" id="steckplatz">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<div class="modal-footer">
					<div class="statusmeldung" id="geraetestatusmeldung"></div>
					<button type="button" class="btn btn-primary saveItem" id="saveGeraete" itemType="geraet">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>