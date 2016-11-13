var base_url = window.location.origin;
var app_url_php = "";
if(base_url.includes("localhost"))
{
	app_url_php = base_url+'/terraworld/php/';
}
else
{
	app_url_php = base_url+'/php/';
}


var itemID;
var terraid;
var geraeteid;