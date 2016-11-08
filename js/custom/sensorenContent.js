// // //Create
// $('#saveSensoren').click(function(e)
// {
	// sendSensorenRequest({terraid:itemID,id:$('#sensorenID').val(),title:$('#sensorenBezeichnung').val(),sensorennummer:$('#sensorenNummer').val()});
// });	


// $('#sensorenModal').on('hidden.bs.modal', function () 
// {
	// refreshSensorenInput();
// })
// var sendSensorenRequest = function(data)
// {
	// $.ajax(
    // {
		// type:'POST',
		// url: base_url+'/terraworld/php/sensorenManager.php',
		// data: data
    // })
    // .done(function(response)
    // {
		// $('#sensorenModal').modal('hide');
		// $('#sensorenbody'+itemID).html(response);
    // })
    // .fail(function()
    // {
		// $('#sensorenstatusmeldung').html('<br><div class="alert alert-danger" role="alert">Bei der Verbindung zum Server ist leider etwas schief gegangen, bitte wenden Sie sich an den Administrator (Vermutlich liegt es an der BaseURL, da Sie auf dem Entwicklungsserver unterwegs sind).</div>');
    // });
// }
// var refreshSensorenInput = function()
// {
	// $('#sensorenstatusmeldung').empty();
	// $('#sensorenID').val('');
	// $('#sensorenBezeichnung').val('');
	// $('#sensorenNummer').val('');
	// $('#sensorenModal .modal-title').html('Sensor hinzufügen');
// }