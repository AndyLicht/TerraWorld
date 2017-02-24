<?php

	function contentUebersicht($json)
	{
		foreach ($json as $tkey => $terra)
		{
			if(sizeof($terra['sensoren']) > 0)
			{	
				echo "<h3>Sensoren: ".$terra['title']."</h3><br>";
				foreach($terra['sensoren'] as $sensorID => $sensor)
				{
					echo "<div class='row'><div class='col-md-4'>";
					echo $sensor['title']." (gemessen um: ".$sensor['time']." am ".$sensor['date'].")<br>";
					echo "relative Luftfeuchtigkeit: ".$sensor['humidity']."%<br>";
					echo "Temperatur: ".$sensor['temp']."°<br>";
					echo "<br></div>";
					echo "<div class='col-md-8' id=".$sensorID."></div></div>";
				}
				foreach($terra['kameras'] as $kkey => $kamera)
				{
					echo "<img src='img/".$kkey.".jpg' alt='Smiley face' height='320' width='480'>";
				}
			}
		}
	}
?>
