<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/tallenna.php-->
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
mysqli_query($yht, "SET NAMES 'utf8'");
function parse($input, $con){
return mysqli_real_escape_string($con, $input);
}
		$query = "UPDATE sivut SET nimi = '". parse($_POST['nimi'], $yht) ."', kuva = '". parse($_POST['kuva'], $yht) ."', color = '". parse($_POST['vari'], $yht) ."', teksti = '". parse($_POST['teksti'], $yht) ."', html = '". parse($_POST['html'], $yht) ."', selitys = '". parse($_POST['selitys'], $yht) ."' WHERE id = ". $_POST['id'];
		mysqli_query($yht, $query); 
		header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php?msg=edited' );
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
