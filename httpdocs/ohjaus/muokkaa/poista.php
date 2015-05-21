<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/poista.php-->
<?php


include "../passphrase.php";




	if ($logged){
		
		include "../../db.php";

		$query = "DELETE FROM sivut WHERE uid = '". $_GET['uid']."'";
		mysqli_query($yht, $query);
		echo($query);
		header( 'Location: ../paneeli.php?msg=deleted' );
	}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
