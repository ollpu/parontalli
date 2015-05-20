<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/tallenna.php-->
<?php


include "../passphrase.php";
include "../../db.php";


function parse($input, $con){
	return mysqli_real_escape_string($con, $input);
}

	if ($logged == true){
		
		
		include "../tietokanta/animaldb_generate.php";
		
		mysqli_query($yht, "SET NAMES 'utf8'");
		$_POST['teksti'] = nl2br($_POST['teksti']);
		
		$query = "UPDATE sivut SET
			nimi = '". parse($_POST['nimi'], $yht) ."',
			kuva = '". parse($_POST['kuva'], $yht) ."',
			color = '". parse($_POST['vari'], $yht) ."',
			predit_teksti = '". parse($_POST['teksti'], $yht) ."',
			predit_html = '". parse($_POST['html'], $yht) ."',
			selitys = '". parse($_POST['selitys'], $yht)
			."' WHERE uid = '". $_POST['uid'] ."'";
		if(mysqli_query($yht, $query)) {
			generate_and_save_page($yht, $_POST['uid'], $_POST['teksti'], $_POST['html']);
			header( 'Location: ../paneeli.php?msg=edited' );
		} else {
			header( 'Location: ../paneeli.php?msg=editf' );
		}
	}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
