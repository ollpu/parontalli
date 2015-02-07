<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/admintool_createuid.php-->
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

$yht = mysqli_connect("mysql.hostinger.fi","u611502351_ojala","Paalihevoset01","u611502351_ojala");

function create_uid($con){
	for (; ;){
		$atmpt = substr(str_shuffle(MD5(microtime())), 0, 4);
		$haku_uid = mysqli_query($con, "SELECT * FROM sivut WHERE uid='". $atmpt ."'");
		if (mysqli_fetch_array($haku_uid) !== false){
			$available = true;
			return $atmpt;
		}
	}
}
echo create_uid($yht);
}else{echo "Et ole kirjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";}
?>
