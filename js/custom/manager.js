//Delete, vorbereiten der Daten
$(document.body).on('click', '.deleteItem' ,function()
{
	terraid = $(this).parent().parent().parent().parent().attr('terraid');
	geraeteid = $(this).parent().parent().parent().parent().attr('geraeteid');
	linkType = $(this).attr('linkType');
	_sendRequest({id:$(this).parent().parent().children(':first-child').html(), gtype:'delete',itemType:$(this).attr('itemType'),terraid:terraid, geraeteid:geraeteid},linkType);
})
//Manipulate, Modal öffnen und Felder aufzeigen
$(document.body).on('click', '.manipulateItem' ,function()
{	
	itemClass = $(this).attr('itemType');
	linkType = $(this).attr('linkType');
	terraid = $(this).parent().parent().parent().parent().attr('terraid');
	console.log(terraid);
	geraeteid = $(this).parent().parent().parent().parent().attr('geraeteid');
	$(this).parent().parent().children('td').each(function()
	{
		key = $(this).attr('key');
		content = $(this).html();
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
	if(typeof $(e.relatedTarget).attr('terraid') != 'undefined')
	{
		terraid = $(e.relatedTarget).attr('terraid');
	}
	if(typeof $(e.relatedTarget).attr('geraeteid') != 'undefined')
	{
		geraeteid = $(e.relatedTarget).attr('geraeteid');
	}
	console.log(geraeteid);
	console.log(terraid);
})

//Save Button 
$('.saveItem').click(function()
{
	itemClass = $(this).attr('itemType');
	linkType = $(this).attr('linkType');
	data = {gtype:'change',itemType:itemClass, terraid:terraid, geraeteid:geraeteid};	
	$('#'+itemClass+'Body').children('.modalInput').each(function()
	{
		data[$(this).attr('key')] = $(this).val();
	});
	console.log(data);
	_sendRequest(data,linkType);
});

//Felder leeren, wenn das Modal geschlossen wird
//bei close wird das Feld geschlossen

var _sendRequest = function(data,requestType)
{
    $.ajax(
    {
	type:'POST',
	url: app_url_php+'manager.php',
	data: data
    })
    .done(function(response)
    {
	window.location.replace(location.origin +"?target="+requestType);
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown)
    {
	console.log('Error');
	console.log(textStatus);
	console.log(errorThrown);
    });
}