<div class="bg1"></div>
<div class="bg2"></div>
<br/>
<div class="header">
	<h1>Parontalli</h1>
	<? 
		if(substr($_SERVER[REQUEST_URI], 0, 4) == '/dev') {
			echo("Olet /dev/ sivuilla. 
Näillä sivuilla kokeillaan kehitystyön alla olevia toimintoja, joten jotkin toiminnot voivat olla epävakaita.");
		} 
	?>
	<br/>
</div>
