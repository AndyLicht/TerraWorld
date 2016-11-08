// $(function() {
// $('#timepicker').datetimepicker({
	// language: 'en',
	// pick12HourFormat: true
// });
// });

// //Create
// $('#saveZeiten').click(function(e)
// {
	// sendZeitenRequest({geraeteid:itemID,id:$('#zeitenID').val(),on:$('#zeitenAn').val(),off:$('#zeitenAus').val()});
// });	

// //Patch
// // $(document.body).on('click', '.manipulateZeit' ,function()
// // {
	// // $('#zeitenID').val($(this).parent().parent().children(':first-child').html());
	// // $('#zeitenAn').val($(this).parent().parent().children(':nth-child(2)').html());
	// // $('#zeitenAus').val($(this).parent().parent().children(':nth-child(3)').html());
	// // $('#geraeteModal .modal-title').html('Zeit ändern');
	// // $('#zeitenModal').modal('show');
	// // itemID = $(this).closest('table').attr('nummer');
// // })
// $('#zeitenModal').on('show.bs.modal', function (e) 
// {
	// itemID = $(e.relatedTarget).attr('id');
// })


// $('#zeitenModal').on('hidden.bs.modal', function () 
// {
	// refreshZeitenInput();
// })

// var sendZeitenRequest = function(data)
// {
	// $.ajax(
    // {
		// type:'POST',
		// url: base_url+'/terraworld/php/zeitenManager.php',
		// data: data
    // })
    // .done(function(response)
    // {
		// $('#zeitenModal').modal('hide');
		// $('#zeitenbody'+itemID).html(response);
    // })
    // .fail(function()
    // {
		// $('#zeitenstatusmeldung').html('<br><div class="alert alert-danger" role="alert">Bei der Verbindung zum Server ist leider etwas schief gegangen, bitte wenden Sie sich an den Administrator (Vermutlich liegt es an der BaseURL, da Sie auf dem Entwicklungsserver unterwegs sind).</div>');
    // });
// }
// var refreshZeitenInput = function()
// {
	// console.log('hidden');
	// $('#zeitenstatusmeldung').empty();
	// $('#zeitenID').val('');
	// $('#zeitenAn').val('');
	// $('#zeitenAus').val('');
	// $('#zeitenModal .modal-title').html('Zeit hinzufügen');
// }