<?php
	
	$yht = mysqli_connect("localhost","kavija",trim(file_get_contents(dirname(__FILE__) . "/dbpassword.nogit")),"sivusto");
	mysqli_set_charset($yht, "utf8");
	if (mysqli_connect_errno()) {
		echo "Virhe yhdistettäessä tietokantaan: " . mysqli_connect_error();
		end();
	}
	
	
	
?>
