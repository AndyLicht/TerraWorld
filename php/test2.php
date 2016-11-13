<?php
	//Funktion zum Laden des JSON
	$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
	$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
	$requester->connect("tcp://127.0.0.1:5000");
	$json = '[{"id":"581f484957d3f","title":"1","description":"1","sensoren":[{"id":"581f486a559fd","title":"1a","number":"1","temp":"","humidity":"","time":""}],"geraete":[{"id":"581f487fde7c4","title":"jo","type":"Heizmatte","device":"234","number":"2","status":false,"schaltung":[{"id":"581f491c574d2","on":"asdasdas","off":"asdasdasddasdasdasdasd"},{"id":"581f492ef1004","on":"123","off":"123"}]}]},{"id":"581f486261a78","title":"2","description":"2","sensoren":[{"id":"581f48718878c","title":"2a","number":"2","temp":"","humidity":"","time":""}],"geraete":[{"id":"581f48890ef20","title":"ghfhfghgf","type":"Heizmatte","device":"dasd","number":"1","status":false,"schaltung":[{"id":"581f4936a1968","on":"asdas","off":"dsasdasd"}]}]}]';
	$requester->send("x/".$json);
	$reply = $requester->recv();
	$json = json_decode($reply);
	$sensoren = $json->sensoren;
	var_dump($reply);
?>
