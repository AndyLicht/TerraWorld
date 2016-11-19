var save = null;
var timeid = null;
var table = null;
var idarray = new Array();
var row = null;

$(function() 
{
	//DateTimepicker
	


	//Reload function	
    $('#reload').on('click', function(e)
	{
		location.reload(true);
	});

	//Button zum adden von Schaltungen
	$('.addTime').on('click',function(e)
	{
		table = $(this).attr('id');
		save = true;
		idarray = [];
		i = 0;
		$('.schaltungsid').each(function(e)
		{	
			idarray[i] = $(this).html();
			i++;
		});
		newid = getnewid(idarray);
		$('#modalid').html(newid);
		$('#modalon').val('');
		$('#modaloff').val('');
	});
	
	$(document).on('click','button.changeTime',function(e)
	{
		save = false;
		row = $(this).closest('tr');
		id = row.children('.schaltungsid').html();
		timeid = id;
		on = row.children('.schaltungon').html();
		off = row.children('.schaltungoff').html();
		$('#modalid').html(id);
		$('#modalon').val(on);
		$('#modaloff').val(off);
	});
	
	//DeleteTime
	$(document).on('click','button.deleteTime',function(e)
	{
		tr = $(this).closest('tr');
		id = tr.children('.schaltungsid').html();
		tr.remove();
	});
	
	//funktion zum hinzufügen einer Zeitschaltung und dem Ändern einer Zeitschaltung
	$('#speichernButton').click(function(e)
	{
		if (save)
		{
			table ='tb'+table;
			button = '<button class="btn btn-default deleteTime"><span class="glyphicon glyphicon-minus"></span></button><button class="btn btn-default changeTime" href="#timechange" data-toggle="modal"><span class="glyphicon glyphicon-cog"></span></button>';
			//Ajax-Funktion zum Abspeichern auf dem Server
			
			//Zeile hinzufügen
			$('#'+table+' tr:last').after('<tr><td class="schaltungsid">'+$('#modalid').html()+'</td><td class="schaltungon">'+$('#modalon').val()+'</td><td class="schaltungoff">'+$('#modaloff').val()+'</td><td>'+button+'</td></tr>');
		}
		else
		{
			//Ajax Funktion
			//Zeile abändern
			row.children('.schaltungon').html($('#modalon').val());
			row.children('.schaltungoff').html($('#modaloff').val());
		}
	});

	$(".OnOff").bootstrapSwitch();
	$('.OnOff').on('switchChange', function (e, data)
	{
		var $element = $(data.el),
		value = data.value;
		if(value == false)
		{
			alert("Ausschalten: "+data.el.context.name);
		}
		else
		{
			alert("Einschalten: "+data.el.context.name);
		}
	});
});

function getnewid()
{
	newid = Math.floor(Math.random() * 1000) + 1;
	while(checkid(newid))
	{
		newid = Math.floor(Math.random() * 1000) + 1;
	}
	return newid;
}
function checkid(newid)
{
	for (var i=0; i<idarray.length; i++)
	{
		if (newid === idarray[i])
		{
			return true;
		}
		else
		{
			return false;
		}
	} 
}
