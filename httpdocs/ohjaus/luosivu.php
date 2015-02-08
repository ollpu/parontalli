<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/luosivu.php-->
<?php

include "passphrase.php";


function parse($input, $con){
	return mysqli_real_escape_string($con, $input);
}

function create_uid($con){
	for (; ;){
		$atmpt = substr(str_shuffle(MD5(microtime())), 0, 4);
		$haku_uid = mysqli_query($con, "SELECT * FROM sivut WHERE uid='". $atmpt ."'");
		if (mysqli_fetch_array($haku_uid) !== false){
			return $atmpt;
		}
	}
}

if ($logged == true){
	
	include "../db.php";


	$haku = mysqli_query($yht, "SELECT * FROM sivut WHERE nimi='". parse($_POST["nimi"], $yht) ."'");
	if (mysqli_fetch_array($haku) !== false){
		
		$query = "INSERT INTO sivut (nimi, teksti, kuva, color, selitys, uid) VALUES ('". parse($_POST["nimi"], $yht) ."', '". parse($_POST["teksti"], $yht) ."', '". parse($_POST["kuva"], $yht) ."', '". parse($_POST["vari"], $yht) ."', '". parse($_POST["selitys"], $yht) ."', '". create_uid($yht) ."')";
		mysqli_query($yht, $query);
		header( 'Location: ./paneeli.php?msg=created' );
	} else {header( 'Location: ./paneeli.php?msg=exsisting' );;}
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}


?>
