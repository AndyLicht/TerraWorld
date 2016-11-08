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
		url: base_url+'/terraworld/php/test.php',
    })
    .done(function(response)
    {
		console.log(response);
		$('#portArea').html(JSON.stringify(response, undefined, 4));
		//$('#portArea').val(JSON.stringify(response, undefined, 4));
    })
    .fail(function()
    {
		console.log('mist');
    });
});

$(function() 
{
	$("[name='my-checkbox']").bootstrapSwitch();
});