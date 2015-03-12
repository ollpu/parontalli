<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/tietokanta/muokkaa/tallenna.php-->
<?php


$rel = "../../../";

include $rel.'ohjaus/passphrase.php';


function parse($input, $con){
	return mysqli_real_escape_string($con, $input);
}

if ($logged == true){
	
	include $rel.'db.php';
	
	mysqli_query($yht, "SET NAMES 'utf8'");
  
	$query = "UPDATE animals SET "
    ."nimi = '". parse($_POST['nimi'], $yht)
    ."', kuva = '". parse($_POST['kuva'], $yht)
    ."', color = '". parse($_POST['vari'], $yht)
    ."', teksti = '". parse($_POST['teksti'], $yht)
    ."', html = '". parse($_POST['html'], $yht)
    ."', selitys = '". parse($_POST['selitys'], $yht)
    ."' WHERE uid = '". $_POST['uid'] ."'"
  ;
	if(mysqli_query($yht, $query)) {
		header( 'Location: ../paneeli.php?msg=edited' );
	} else {
		header( 'Location: ../paneeli.php?msg=editf' );
	}
} else { echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>"; }

?>
