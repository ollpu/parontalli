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
    ."name = '". parse($_POST['name'], $yht)
    ."', img = '". parse($_POST['img'], $yht)
    ."', link = '". parse($_POST['link'], $yht)
    ."', sukuposti = '". parse($_POST['sukuposti'], $yht)
    ."', text = '". parse($_POST['text'], $yht)
    ."', price = '". parse($_POST['price'], $yht)
    ."' WHERE id_name = '". $_POST['id_name'] ."'"
  ;
	if(mysqli_query($yht, $query)) {
		header( 'Location: ../katsele?id='.$_POST['id_name'].'&edit=success' );
	} else {
		header( 'Location: ../katsele?id='.$_POST['id_name'].'&edit=failed' );
	}
} else { echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>"; }

?>
