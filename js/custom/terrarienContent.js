// //Create
// $('#saveTerra').click(function(e)
// {
	// sendRequest({id:$('#terraID').val(),description:$('#terraBeschreibung').val(),title:$('#terraBezeichnung').val()});
// });	

// // //Patch
// // $(document.body).on('click', '.manipulateTerra' ,function()
// // {
	// // $('#terraID').val($(this).parent().parent().children(':first-child').html());
	// // $('#terraBezeichnung').val($(this).parent().parent().children(':nth-child(2)').html());
	// // $('#terraBeschreibung').val($(this).parent().parent().children(':nth-child(3)').html());
	// // $('#terrariumModal .modal-title').html('Terrarium ändern');
	// // $('#terrariumModal').modal('show');
// // })

// // $('#terrariumModal').on('hidden.bs.modal', function () {
    // // refreshInput();
// // })
// var sendRequest = function(data)
// {
	// console.log('sende Request zum TerraManager');
	// $.ajax(
    // {
		// type:'POST',
		// url: base_url+'/terraworld/php/terrarienManager.php',
		// data: data
    // })
    // .done(function(response)
    // {
		// $('#terrariumModal').modal('hide');
		// $('#terraBody').html(response);
    // })
    // .fail(function()
    // {
		// $('#terrastatusmeldung').html('<br><div class="alert alert-danger" role="alert">Bei der Verbindung zum Server ist leider etwas schief gegangen, bitte wenden Sie sich an den Administrator (Vermutlich liegt es an der BaseURL, da Sie auf dem Entwicklungsserver unterwegs sind).</div>');
    // });
// }
// var refreshInput = function()
// {
	// $('#terrastatusmeldung').empty();
	// $('#terraID').val('');
	// $('#terraBeschreibung').val('');
	// $('#terraBezeichnung').val('');
	// $('#terrariumModal .modal-title').html('Terrarium hinzufügen');
// }