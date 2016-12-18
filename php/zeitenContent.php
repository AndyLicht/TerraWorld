<?php
function contentZeiten($json)
{
	?>
		<h2>Zeiten</h2>
	<?php
	zeitenTables($json);
	zeitenModal();
}
function zeitenTables($json)
{
	foreach ($json as $key => $terra)
	{
		echo '<h3>'.$terra['title'].'</h3><br>';
		foreach ($terra['geraete'] as $gkey => $geraet)
		{
			echo 	'<table class="table" geraeteid="'.$gkey.'" terraid="'.$key.'">
						<caption><h3>'.$geraet['title'].'  <button type="button" terraid="'.$key.'" geraeteid ="'.$gkey.'"class="btn btn-default" data-toggle="modal" data-target="#zeit"><span class="glyphicon glyphicon-plus" ></span></button></h3></caption>
						<thead>
							<th>#</th>
							<th>An</th>
							<th>Aus</th>
							<th>Option</th>
						</thead>
						<tbody>';
							foreach($geraet['schaltung'] as $skey => $schaltung)
							{
								echo '<tr><td key="id">'.$skey.'</td><td key="on">'.$schaltung['on'].'</td><td key="off">'.$schaltung['off'].'</td><td key="options"><span class="glyphicon glyphicon-cog manipulateItem" geraeteid="" terraid="'.$key.'" linkType="zeiten" itemType="zeit"></span> <span class="glyphicon glyphicon-trash deleteItem" linkType="zeiten"  itemType="zeit"></span></td></tr>';
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
					<button type="button" class="btn btn-primary saveItem" id="saveZeiten" linkType="zeiten" itemType="zeit">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>