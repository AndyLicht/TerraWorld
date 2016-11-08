<?php

	function contentUebersicht()
	{
		echo '<h3>Übersicht</h3><hr>';
		checkJSONs();
	}

	
	function checkJSONs()
	{
		$files = array('json/terra.json');
		foreach($files as $filename)
		{
			if (file_exists($filename)) 
			{
				echo "die datei $filename existiert<br>";
			}
			else
			{
				$file = fopen($filename, 'w') or die("can't open file");
				fwrite($file, '{}');
				fclose($file);
				echo "die datei $filename wurde angelegt<br>";
			}
		}
	}
?>