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
	})
	.done(function(response)
	{
	    console.log(response);
	    $('#portArea').val(response);
	})
	.fail(function()
	{
	    console.log('mist');
	});
});

$('#exportButton').click(function(e)
{
    console.log("export");
    console.log("Inhalt:");
    console.log($('#portArea').val());
    console.log("Inhalt vorbei");
    $.ajax(
    {
	type:'POST',
	url: app_url_php+'importer.php',
	data: {data:$('#portArea').val(), type:'export'}
    })
    .done(function(response)
    {
	location.reload();
    })
    .fail(function()
    {
	 console.log('mist');
    });
});






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
		if (response === 'OK')
		{
		    //location.reload();
		}
		else
    		{
		    alert('ERROR, siehe console.log');
		    console.log(response);
		}
	    })
	    .fail(function(XMLHttpRequest, textStatus, errorThrown)
	    {
		console.log('Error');
		console.log(textStatus);
		console.log(errorThrown);
	    });
	});
});