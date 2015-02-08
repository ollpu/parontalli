<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/tallenna.php-->
<?php


include "../passphrase.php";


function parse($input, $con){
	return mysqli_real_escape_string($con, $input);
}

	if ($logged == true){
		
		include "../../db.php";
		
		mysqli_query($yht, "SET NAMES 'utf8'");
		
		$query = "UPDATE sivut SET nimi = '". parse($_POST['nimi'], $yht) ."', kuva = '". parse($_POST['kuva'], $yht) ."', color = '". parse($_POST['vari'], $yht) ."', teksti = '". parse($_POST['teksti'], $yht) ."', html = '". parse($_POST['html'], $yht) ."', selitys = '". parse($_POST['selitys'], $yht) ."' WHERE id = ". $_POST['id'];
		mysqli_query($yht, $query); 
		header( 'Location: ../paneeli.php?msg=edited' );
	}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
