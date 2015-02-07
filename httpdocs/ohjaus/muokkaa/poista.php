<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/poista.php-->
<?php

session_start();
include "../passphrase.php";
$pwd = $_SESSION["pwd"];

$logged = $pwd == $key;


	if ($logged == true){
		
		include "../../db.php";

		$query = "DELETE FROM sivut WHERE id = ". $_GET['id'];
		mysqli_query($yht, $query); 
		echo($query);
		header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php?msg=deleted' );
	}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
