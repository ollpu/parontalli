<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/kuvat/katsele/tallenna.php-->
<?php


$rel = "../../../";

include $rel.'ohjaus/passphrase.php';


function parse($input, $con){
	return mysqli_real_escape_string($con, $input);
}

if ($logged == true) {
	
	include $rel.'db.php';
	
	mysqli_query($yht, "SET NAMES 'utf8'");
  
	$query = "UPDATE images SET "
    ."text = '". parse($_POST['text'], $yht)
    ."', author = '". parse($_POST['author'], $yht)
		."', associated_animal = '". parse($_POST['associated_animal'], $yht)
    ."' WHERE `imgur-uid` = '". $_POST['imgur-uid'] ."'"
  ;
	if(mysqli_query($yht, $query)) {
		header( 'Location: ../katsele?id='.$_POST['imgur-uid'].'&edit=success' );
	} else {
		header( 'Location: ../katsele?id='.$_POST['imgur-uid'].'&edit=failed' );
	}
} else { echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>"; }

?>
