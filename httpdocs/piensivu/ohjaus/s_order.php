<!--Kotisivut Riikka/Hevoset, draft 1; /ohjaus/s_order.php-->
<?php

$key = md5("avain1234");
$pwd = $_COOKIE["pwd"];
	if ($pwd == $key){
		$logged = true;
		
	}else{$logged = false;}
if (mysqli_connect_errno()) {
	echo "Virhe yhdistettäessä tietokantaan: " . mysqli_connect_error();
	end();
}else{echo "Connection started!<br>";}
	if ($logged == true){
	$unique = array_unique($_POST, SORT_NUMERIC);
	if ($unique == $_POST){
		$yht = mysqli_connect("localhost","kavija","Hevoskavija01#!","sivusto");
		mysqli_set_charset($yht, "utf8");
		$haku = mysqli_query($yht, "SELECT * FROM sivut");
		while ($row = mysqli_fetch_array($haku)){
			$query = "UPDATE sivut SET id = '".$_POST[$row['id']]."' WHERE id = ". $row['id'];
			mysqli_query($yht, $query); 
		}
		header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php?msg=order' );
	}else{header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php?msg=orderdupl' );}
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
