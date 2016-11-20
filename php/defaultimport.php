<?php
if($_POST['type'] === 'export')
{
    writeJSON($_POST['data']);
}
else
{
    $json = loadJSON();
    echo $json;
}


function loadJSON()
{
    $json;
    $json = file_get_contents('../json/default.json');
    return $json;
}

function writeJSON($data)
{
	echo $data;
	$fp = fopen('../json/default.json', 'w');
	fwrite($fp, $data);
	fclose($fp);
	echo "OK";
}
?>
