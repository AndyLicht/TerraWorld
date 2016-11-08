 // // $("#steckdosenleiste").TouchSpin({
                // // min:1,
                // // max: 10,
                // // stepinterval: 1
            // // });


// //Create
// $('#saveGeraete').click(function(e)
// {
	// sendGeraeteRequest({terraid:itemID,id:$('#geraeteID').val(),title:$('#geraeteBezeichnung').val(),type:$('#geraeteTyp').val(),device:$('#steckdosenleiste').val(), number:$('#steckplatz').val()});
// });	
// // //Patch
// // $(document.body).on('click', '.manipulateGeraet' ,function()
// // {
	// // $('#geraeteID').val($(this).parent().parent().children(':first-child').html());
	// // $('#geraeteBezeichnung').val($(this).parent().parent().children(':nth-child(2)').html());
	// // $('#geraeteType').val($(this).parent().parent().children(':nth-child(3)').html());
	// // $('#steckdosenleiste').val($(this).parent().parent().children(':nth-child(4)').html());
	// // $('#steckplatz').val($(this).parent().parent().children(':nth-child(5)').html());
	// // $('#geraeteModal .modal-title').html('Gerät ändern');
	// // $('#geraeteModal').modal('show');
	// // itemID = $(this).closest('table').attr('nummer');
// // })
// // $('#geraeteModal').on('show.bs.modal', function (e) 
// // {
	// // itemID = $(e.relatedTarget).attr('id');
// // })


// $('#geraeteModal').on('hidden.bs.modal', function () 
// {
	// refreshGeraeteInput();
// })
// var sendGeraeteRequest = function(data)
// {
	// $.ajax(
    // {
		// type:'POST',
		// url: base_url+'/terraworld/php/geraeteManager.php',
		// data: data
    // })
    // .done(function(response)
    // {
		// $('#geraeteModal').modal('hide');
		// $('#body'+itemID).html(response);
    // })
    // .fail(function()
    // {
		// $('#geraetestatusmeldung').html('<br><div class="alert alert-danger" role="alert">Bei der Verbindung zum Server ist leider etwas schief gegangen, bitte wenden Sie sich an den Administrator (Vermutlich liegt es an der BaseURL, da Sie auf dem Entwicklungsserver unterwegs sind).</div>');
    // });
// }
// var refreshGeraeteInput = function()
// {
	// $('#geraetestatusmeldung').empty();
	// $('#geraeteID').val('');
	// $('#geraeteBezeichnung').val('');
	// $('#geraeteType').val('');
	// $('#steckdosenleiste').val('');
	// $('#steckplatz').val('');
	// $('#geraeteModal .modal-title').html('Gerät hinzufügen');
// }