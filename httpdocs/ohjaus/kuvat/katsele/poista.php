<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/kuvat/katsele/poista.php-->
<?php


$rel = '../../../';

include $rel.'ohjaus/passphrase.php';




	if ($logged){
		
		include $rel.'db.php';

		$query = "DELETE FROM images WHERE `imgur-uid` = '{$_GET['id']}'";
		mysqli_query($yht, $query);
		echo($query);
		header( 'Location: ../' );
	} else {echo "Et ole kirjautunut si&auml;&auml;n. <a href='{$rel}ohjaus'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
