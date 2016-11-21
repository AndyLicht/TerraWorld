<?php

	function contentUebersicht($json)
	{
		echo '<h3>Übersicht</h3><hr>';
		foreach ($json as $tkey => $terra)
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
		echo "<img src='img/image.jpg' alt='Smiley face' height='600' width='800'>";
	}
?>