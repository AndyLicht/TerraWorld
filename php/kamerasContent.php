<?php
function contentKameras($json)
{
	?>
		<h3>Kameras</h3>
	<?php
	kamerasTables($json);
	kamerasModal();
}
function kamerasTables($json)
{
	foreach ($json as $key => $terra)
	{
		echo 	'<table class="table" terraid="'.$key.'" kameraid="">
					<caption><h3>'.$terra['title'].'('.$key.') <button type="button" terraid="'.$key.'" class="btn btn-default" data-toggle="modal" data-target="#kamera"><span class="glyphicon glyphicon-plus" ></span></button></h3></caption>
					<thead>
						<th>#</th>
						<th>Bezeichnung</th>
						<th>Art</th>
						<th>Device</th>
						<th>Schaltung</th>
						<th>Option</th>
					</thead>
					<tbody>';
					foreach($terra['kameras'] as $kkey => $kamera)
					{
						echo '<tr><td key="id">'.$kkey.'</td><td key="title">'.$kamera['title'].'</td><td key="type">'.$kamera['type'].'</td><td key="device">'.$kamera['device'].'</td><td key="kameraminutes">'.$kamera['kameraminutes'].'</td><td key="options"><span class="glyphicon glyphicon-cog manipulateItem" kameraid="" terraid="'.$key.'" linkType="kameras" itemType="kamera"></span> <span class="glyphicon glyphicon-trash deleteItem" linkType="kameras" itemType="kamera"></span></td></tr>';
					}
		echo 		'</tbody>
				</table>';
	};
}

function kamerasModal()
{
?>
	<div class="modal fade" id="kamera" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Kamera hinzufügen</h4>
				</div>
				<div class="modal-body" id="kameraBody">
					<label>ID:</label>
					<input type="text" class="form-control modalInput" key="id" id="kameraID" placeholder="wird automatisch vergeben" disabled>
					<label>Bezeichnung:</label>
					<input type="text" class="form-control modalInput" key="title" id="kameraBezeichnung" placeholder="Bezeichnung">
					<label>Art:</label>
					<select class="form-control modalInput" key="type" id="kameraTyp">
						<option value="USB-Device">USB-Device</option>
						<option value="RasPi-Modul">RasPi-Modul</option>
					</select>
					<label>Device:</label>
					<input type="text"  class="form-control modalInput" id="kameradevice" key="device"/>
					<label>Minuten an denen ein Foto erzeugt werden soll:</label>
					<input type="text"  class="form-control modalInput" id="kameraminutes" key="kameraminutes"/>
				</div>
				<div class="modal-footer">
					<div class="statusmeldung" id="kamerastatusmeldung"></div>
					<button type="button" class="btn btn-primary saveItem" id="saveKameras" linkType="kameras" itemType="kamera">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>