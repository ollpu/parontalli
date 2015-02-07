<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/poista.php-->
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

$yht = mysqli_connect("localhost","kavija","Hevoskavija01#!","sivusto");
mysqli_set_charset($yht, "utf8");

		$query = "DELETE FROM sivut WHERE id = ". $_GET['id'];
		mysqli_query($yht, $query); 
		echo($query);
		header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php?msg=deleted' );
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>