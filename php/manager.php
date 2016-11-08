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
				$obj = (object)[
					'id' => uniqid(),
					'title' => $_POST['title'],
					'description' => $_POST['description'],
					'sensoren' => array(),
					'geraete' => array()
				];
				$GLOBALS['json'][] = $obj;
				break;
			case "sensor":
				foreach($GLOBALS['json'] as $key => $terra)
				{
					if ($terra['id'] === $_POST['parentID'])
					{
						$obj = (object)[
							'id' => uniqid(),
							'title' => $_POST['title'],
							'number' => $_POST['number'],
							'temp' => '',
							'humidity' => '',
							'time' => ''					
						];
						$GLOBALS['json'][$key]['sensoren'][] = $obj;
						break;
					}
				}
				break;
			case "geraet":
				foreach($GLOBALS['json'] as $key => $terra)
				{
					if ($terra['id'] === $_POST['parentID'])
					{
						$obj = (object)[
							'id' => uniqid(),
							'title' => $_POST['title'],
							'type' => $_POST['type'],
							'device' => $_POST['device'],
							'number' => $_POST['number'],
							'status' => false,
							'schaltung' => []
						];
						$GLOBALS['json'][$key]['geraete'][] = $obj;
						break;
					}
				}
				break;
			case "zeit":
				foreach($GLOBALS['json'] as $tkey => $terra)
				{
					foreach($terra['geraete'] as $gkey => $geraet)
					{
						if($geraet['id'] === $_POST['parentID'])
						{
							$obj = (object)[
								'id' => uniqid(),
								'on' => $_POST['on'],
								'off' => $_POST['off'],
							];
							$GLOBALS['json'][$tkey]['geraete'][$gkey]['schaltung'][] = $obj;
							break;
						}	
					}
				}
				break;
		}
	}

	function deleteItem($id)
	{
		switch ($_POST['itemType'])
		{
			case 'terrarium':
				foreach ($GLOBALS['json'] as $key => $item)
				{
					if ($item['id'] === $_POST['id'])
					{
						unset($GLOBALS['json'][$key]);
						break;
					}
				}
			case 'sensor':
				foreach ($GLOBALS['json'] as $key => $terra)
				{
					foreach ($terra['sensoren'] as $skey => $sensor)
					{
						if($sensor['id'] === $_POST['id'])
						{
							unset($GLOBALS['json'][$key]['sensoren'][$skey]);
							break;
						}
					}
				}
			case 'geraet':
				foreach ($GLOBALS['json'] as $key => $terra)
				{
					foreach ($terra['geraete'] as $gkey => $geraet)
					{
						if($geraet['id'] === $_POST['id'])
						{
							unset($GLOBALS['json'][$key]['geraete'][$gkey]);
							break;
						}
					}
				}
			case 'zeit':
				foreach ($GLOBALS['json'] as $tkey => $terra)
				{
					foreach ($terra['geraete'] as $gkey => $geraet)
					{
						foreach ($geraet['schaltung'] as $skey => $schaltung)
						{
							if($schaltung['id'] === $_POST['id'])
							{
								unset($GLOBALS['json'][$tkey]['geraete'][$gkey]['schaltung'][$skey]);
								break;
							}
						}
					}
				}
		}
	}
	
	
	function manipulateItem()
	{
		switch ($_POST['itemType'])
		{
			case "terrarium":
				foreach ($GLOBALS['json'] as $key => $terra)
				{
					if($terra['id'] === $_POST['id'])
					{
						$GLOBALS['json'][$key]['title'] = $_POST['title'];
						$GLOBALS['json'][$key]['description'] = $_POST['description'];
						break;
					}
				}
			case "sensor":
				foreach ($GLOBALS['json'] as $key => $terra)
				{
					foreach ($terra['sensoren'] as $skey => $sensor)
					{
						if($sensor['id'] === $_POST['id'])
						{
							$GLOBALS['json'][$key]['sensoren'][$skey]['title'] = $_POST['title'];
							$GLOBALS['json'][$key]['sensoren'][$skey]['number'] = $_POST['number'];
							break;
						}
					}
				}
			case "geraet":
				foreach ($GLOBALS['json'] as $key => $terra)
				{
					foreach ($terra['geraete'] as $gkey => $geraet)
					{
						if($geraet['id'] === $_POST['id'])
						{
							$GLOBALS['json'][$key]['geraete'][$gkey]['title'] = $_POST['title'];
							$GLOBALS['json'][$key]['geraete'][$gkey]['type'] = $_POST['type'];
							$GLOBALS['json'][$key]['geraete'][$gkey]['device'] = $_POST['device'];
							$GLOBALS['json'][$key]['geraete'][$gkey]['number'] = $_POST['number'];
							break;
						}
					}
				}
			case "zeit":
				foreach ($GLOBALS['json'] as $tkey => $terra)
				{
					foreach ($terra['geraete'] as $gkey => $geraet)
					{
						foreach ($geraet['schaltung'] as $skey => $schaltung)
						{
							if($schaltung['id'] === $_POST['id'])
							{
								$GLOBALS['json'][$tkey]['geraete'][$gkey]['schaltung'][$skey]['on'] = $_POST['on'];
								$GLOBALS['json'][$tkey]['geraete'][$gkey]['schaltung'][$skey]['off'] = $_POST['off'];
								break;
							}
						}
					}
				}
		}
	}
	
	
	function loadJSON()
	{
		$jsonfile = file_get_contents('../json/terra.json');
		$GLOBALS['json'] = json_decode($jsonfile, true); // decode the JSON into an associative array
	}
	
	function writeJSON()
	{
		$fp = fopen('../json/terra.json', 'w');
		fwrite($fp, json_encode($GLOBALS['json']));
		fclose($fp);
	}
?>