//Quelle http://www.jquerybyexample.net/2012/06/get-url-parameters-using-jquery.html
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


//Get Parameter auswerten
if(!getUrlParameter('target'))
{
    console.log('nicht definiert');
}
else
{
    $('.nav-sidebar a[href="#'+getUrlParameter('target')+'"]').tab('show');
}
//Navigation auf der linken Seite
$('#myTabs a').click(function (e) 
{
	e.preventDefault()
	$(this).tab('show')
})

$('#importButton').click(function(e)
{
	$.ajax(
	{
		type:'POST',
		url: app_url_php+'importer.php',
		data: {type:'import'}
	})
	.done(function(response)
	{
	    console.log(response);
	    $('#portArea').val(response);
	})
	.fail(function(error)
	{
	    console.log('Error:');	
	    console.log(error);
	});
});

$('#importDefault').click(function(e)
{
    $.ajax(
    {
	type:'POST',
	url: app_url_php+'defaultimport.php',
	data: {type:'import'}
    })
    .done(function(response)
    {
	console.log(response);
	$('#portArea').val(response);
    })
    .fail(function(error)
    {
	console.log('Error:');
        console.log(error);
    });
});



$('#exportButton').click(function(e)
{
    $.ajax(
    {
	type:'POST',
	url: app_url_php+'importer.php',
	data: {data:$('#portArea').val(), type:'export'}
    })
    .done(function(response)
    {
	window.location.replace(location.origin +"?target=port");
    })
    .fail(function(error)
    {
	 console.log('Error:');
         console.log(error);
    });
});

$('#exportDefault').click(function(e)
{
    $.ajax(
    {
	type:'POST',
	url: app_url_php+'defaultimport.php',
	data: {data:$('#portArea').val(), type:'export'}
    })
    .done(function(response)
    {
	window.location.replace(location.origin +"?target=port");
	console.log("save");
    })
    .fail(function(error)
    {
	console.log('Error:');
        console.log(error);
    });
});



//Schalten der Geräte

$(function()
{
	$("[name='my-checkbox']").bootstrapSwitch();
	$('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) 
	{
	    if(state===true)
	    {
		command = '-o';
	    }
	    else
	    {
		command = '-f';
	    }

	    $.ajax(
	    {
		type:'POST',
		url: app_url_php+'control.php',
		data: {tid:$(this).attr('tid'),gid:$(this).attr('gid'),state:state,command:command}
	    })
	    .done(function(response)
	    {
		window.location.replace(location.origin +"?target=steuerung");
	    })
	    .fail(function(XMLHttpRequest, textStatus, errorThrown)
	    {
		console.log('Error');
		console.log(textStatus);
		console.log(errorThrown);
	    });
	});
});
