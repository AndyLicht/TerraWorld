<?php

	function contentUebersicht($json)
	{
		foreach ($json as $tkey => $terra)
		{
			if(sizeof($terra['sensoren']) > 0)
			{	
				echo "<h3>Sensoren: ".$terra['title']."</h3><br>";
				foreach($terra['sensoren'] as $sensor)
				{
				echo $sensor['title']." (gemessen um: ".$sensor['time'].")<br>";
				echo "relative Luftfeuchtigkeit: ".$sensor['humidity']."%<br>";
				echo "Temperatur: ".$sensor['temp']."°<br>";
				echo "<br>";
				}
			}
		}
		echo "<img src='img/image.jpg' alt='Smiley face' height='600' width='800'>";
	}
?>