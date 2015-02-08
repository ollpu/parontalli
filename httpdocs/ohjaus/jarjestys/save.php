<!--Kotisivut Riikka/Hevoset, draft 1; /ohjaus/s_order.php-->
<?php

$rel = "../../";


include $rel."ohjaus/passphrase.php";



if ($logged == true){
	$unique = array_unique($_POST, SORT_NUMERIC);
	if ($unique == $_POST){
		include $rel."db.php";
		$haku = mysqli_query($yht, "SELECT * FROM sivut");
		while ($row = mysqli_fetch_array($haku)){
			$query = "UPDATE sivut SET id = '".$_POST[$row['id']]."' WHERE id = ". $row['id'];
			mysqli_query($yht, $query); 
		}
		header( 'Location: ../paneeli.php?msg=order' );
	}else{header( 'Location: ../paneeli.php?msg=orderdupl' );}
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
