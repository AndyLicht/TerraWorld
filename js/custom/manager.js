//Delete, vorbereiten der Daten
$(document.body).on('click', '.deleteItem' ,function()
{
	_sendRequest({id:$(this).parent().parent().children(':first-child').html(), gtype:'delete',itemType:$(this).attr('itemType')});
})
//Manipulate, Modal öffnen und Felder aufzeigen
$(document.body).on('click', '.manipulateItem' ,function()
{	
	itemClass = $(this).attr('itemType');
	$(this).parent().parent().children('td').each(function()
	{
		key = $(this).attr('key');
		content =	$(this).html();
		$('#'+itemClass+'Body').children('.modalInput').each(function()
		{
			if($(this).attr('key') === key)
			{
				$(this).val(content);
			}
		});
	});
	$('#'+itemClass).modal('show');	 
});

$('.modal').on('show.bs.modal', function (e) 
{
	console.log($(e.relatedTarget).attr('id'));
	try
	{
		parentID = $(e.relatedTarget).attr('id');
	}
	catch(err)
	{
		parentID = "";
	}
	
})



//Save Button 
$('.saveItem').click(function()
{
	itemClass = $(this).attr('itemType');
	data = {gtype:'change',itemType:itemClass, parentID:parentID};	
	$('#'+itemClass+'Body').children('.modalInput').each(function()
	{
		data[$(this).attr('key')] = $(this).val();
	});
	console.log(data);
	_sendRequest(data);
});

//Felder leeren, wenn das Modal geschlossen wird
//bei close wird das Feld geschlossen




var _sendRequest = function(data)
{
	console.log('Request zum Manager');
	$.ajax(
    {
		type:'POST',
		url: base_url+'/terraworld/php/manager.php',
		data: data
    })
    .done(function(response)
    {
		if (response === 'OK')
		{
			location.reload();
		}
		else
		{
			alert('ERROR, siehe console.log');
			console.log(response);
		}
		//$('#sensorenModal').modal('hide');
		
    })
    .fail(function()
    {
		console.log('error');
    });
}