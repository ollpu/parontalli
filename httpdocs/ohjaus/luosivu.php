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


	
	
	$uid = create_uid($yht);
	$query = "INSERT INTO sivut (uid) VALUES ('". $uid ."')";
	mysqli_query($yht, $query);
	header( 'Location: ./muokkaa/index.php?es='.$uid );
	
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}


?>
