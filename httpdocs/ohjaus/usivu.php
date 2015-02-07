<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/usivu.php-->
<?
$rel = "../";

session_start();
include "passphrase.php";
$pwd = $_SESSION["pwd"];

$logged = $pwd == $key;

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>

<title>
	Uusi sivu - Ohjaus
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="<? print($rel); ?>main.css">

</head>

<body>

<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<a class="sininen" href="../" id="">
		&nbsp;Takaisin&nbsp;
	</a>
	&nbsp;&nbsp;
	<a class="punainen" href="./" id="thispage">
		&nbsp;Ohjaus&nbsp;
	</a>
	<hr class="header" id="">
</div>

<div class="content">
	<h2>
Uusi sivu
	</h2>
	
	<?
		if ($logged == true){
		echo '
		<a href="paneeli.php">Peruuta</a><br>
		<form name="usivu" action="luosivu.php" method="post">
		Sivun nimi: <input type="text" name="nimi"/><br>
		Kuva (URL): <input type="text" name="kuva"/><br>
		V&auml;ri: <select name="vari">
					<option value="sininen">Sininen</option>
					<option value="punainen">Punainen</option>
					<option value="vihrea">Vihre&auml;</option>
					<option value="s_sininen">S&auml;hk&ouml;nsininen</option>
					<option value="kulta">Kullankeltainen</option>
					</select>
		<br>
		Teksti:<br><textarea name="teksti" rows="10" cols="30"></textarea>
		<br>
		Selitys: (hakukoneille)<br><textarea name="selitys" rows="4" cols="20"></textarea>
		<br>
		<input type="submit" value="Luo">
		</form> 
		';
		}else echo "Et ole kitjautunut si&auml;&auml;n. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";
	?>
	
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
