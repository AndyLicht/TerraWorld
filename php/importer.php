<?php
if($_POST['type'] === 'export')
{
    writeJSON($_POST['data']);
}
else
{
    $json = loadJSON();
    echo json_encode($json,JSON_UNESCAPED_SLASHES);
}


function loadJSON()
{
    $json;
    if(strpos(PHP_OS, 'WIN') !== false)
    {
	$json = file_get_contents('../json/terra.json');
    }
    else
    {
	$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
	$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
	$requester->connect("tcp://127.0.0.1:5000");
	$requester->send("i");
	$json = $requester->recv();
    }
    return $json;
}

function writeJSON($data)
{
    if(strpos(PHP_OS, 'WIN') !== false)
    {
	$fp = fopen('../json/terra.json', 'w');
	fwrite($fp, json_encode($json));
	fclose($fp);
    }
    else
    {
	$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
	$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
	$requester->connect("tcp://127.0.0.1:5000");
	$requester->send("i/".json_encode($data));
	$reply = $requester->recv();
    }
}
?>
