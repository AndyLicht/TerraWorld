<?php

	$json;
	loadJSON();
	switch ($_POST['gtype']) 
	{
		case 'delete':
			echo deleteItem($_POST['id']);
			break;
		case 'change':
			if($_POST['id'] != "")
			{
				manipulateItem();
			}
			else
			{
				createItem();
			}
			break;
		default:
			echo "dieser Type wird nicht utnerstützt";
			break;
	}
	writeJSON();
	echo 'OK';

	function createItem()
	{
		switch ($_POST['itemType'])
		{
			case "terrarium":
				$arr =  array(
					'title' => $_POST['title'],
					'description' => $_POST['description'],
					'sensoren' => array(),
					'geraete' => array()
				);
				//var_dump($GLOBALS['json']);
				$GLOBALS['json'][uniqid()] = $arr;
				break;
			case "sensor":
				$arr = array(
					'title' => $_POST['title'],
					'number' => $_POST['number'],
					'temp' => '',
					'humidity' => '',
					'time' => ''
				);				
				$GLOBALS['json'][$_POST['terraid']]['sensoren'][uniqid()] = $arr;
				break;
			case "geraet":
				$arr = array(
					'id' => uniqid(),
					'title' => $_POST['title'],
					'type' => $_POST['type'],
					'device' => $_POST['device'],
					'number' => $_POST['number'],
					'status' => false,
					'schaltung' => []
				);
				$GLOBALS['json'][$_POST['terraid']]['geraete'][uniqid()] = $arr;
				break;
			case "zeit":
				$arr = array(
					'on' => $_POST['on'],
					'off' => $_POST['off'],
				);
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['geraeteid']]['schaltung'][uniqid()] = $arr;
				break;
		}
	}

	function deleteItem($id)
	{
		switch ($_POST['itemType'])
		{
			case 'terrarium':
				unset($GLOBALS['json'][$_POST['id']]);
				break;
			case 'sensor':
				unset($GLOBALS['json'][$_POST['terraid']]['sensoren'][$_POST['id']]);
				break;			
			case 'geraet':
				unset($GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['id']]);
				break;
			case 'zeit':
				unset($GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['geraeteid']]['schaltung'][$_POST['id']]);
				break;		
		}
	}
	
	
	function manipulateItem()
	{
		switch ($_POST['itemType'])
		{
			case "terrarium":
				$GLOBALS['json'][$_POST['id']]['title'] = $_POST['title'];
				$GLOBALS['json'][$_POST['id']]['description'] = $_POST['description'];
				break;
			case "sensor":			
				$GLOBALS['json'][$_POST['terraid']]['sensoren'][$_POST['id']]['title'] = $_POST['title'];
				$GLOBALS['json'][$_POST['terraid']]['sensoren'][$_POST['id']]['number'] = $_POST['number'];
				break;
			case "geraet":
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['id']]['title'] = $_POST['title'];
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['id']]['type'] = $_POST['type'];
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['id']]['device'] = $_POST['device'];
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['id']]['number'] = $_POST['number'];
				break;
			case "zeit":
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['geraeteid']]['schaltung'][$_POST['id']]['on'] = $_POST['on'];
				$GLOBALS['json'][$_POST['terraid']]['geraete'][$_POST['geraeteid']]['schaltung'][$_POST['id']]['off'] = $_POST['off'];
				break;
		}
	}
	
	function loadJSON()
	{
		if(strpos(PHP_OS, 'WIN') !== false)
		{
			$jsonfile = file_get_contents('../json/terra.json');
			$GLOBALS['json']= json_decode($jsonfile, true); // decode the JSON into an associative array
		}
		else
		{	
			$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
			$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
			$requester->connect("tcp://127.0.0.1:5000");
			$requester->send("i");
			$reply = $requester->recv();
			$reply = substr($reply,0,-1);
			$reply = substr($reply,1);
			$GLOBALS['json'] = json_decode($reply,true);
		}
	}
	
	function writeJSON()
	{
		if(strpos(PHP_OS, 'WIN') !== false)
		{
			$fp = fopen('../json/terra.json', 'w');
			fwrite($fp, json_encode($GLOBALS['json']));
			fclose($fp);
		}
		else
		{
			$requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
			$requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
			$requester->connect("tcp://127.0.0.1:5000");
			//var_dump($GLOBALS['json']);
			$requester->send("i/".json_encode($GLOBALS['json']));
			$reply = $requester->recv();
		}
	}
?>