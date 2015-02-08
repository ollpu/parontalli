<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/index.php-->
<?

$rel = "../../";


include $rel."db.php";



include "../passphrase.php";

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>

<title>
	Muokkaa - Ohjaus
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
		&nbsp;Muokkaa&nbsp;
	</a>
	<hr class="header" id="">
</div>

<div class="content">
	<h2>
Muokkaa sivua
	</h2>
	
	<?
		if ($logged == true){
		$haku_ep = mysqli_query($yht, "SELECT * FROM sivut WHERE uid = '". $_GET['es'] ."'");
		$eprow = mysqli_fetch_assoc($haku_ep);
		
		if ($eprow['color'] == "punainen"){$punainen = "selected";}
		if ($eprow['color'] == "sininen"){$sininen = "selected";}
		if ($eprow['color'] == "vihrea"){$vihrea = "selected";}
		if ($eprow['color'] == "s_sininen"){$s_sininen = "selected";}
		if ($eprow['color'] == "kulta"){$kulta = "selected";}
		
		echo '
		<a href="../paneeli.php">Peruuta</a><br>
		<form name="esivu" action="tallenna.php" method="post">
		Sivun nimi: <input type="text" name="nimi" value="'. $eprow['nimi'] .'"><br>
		Kuva (URL): <input type="text" name="kuva" value="'. $eprow['kuva'] .'"><br>
		Väri: <select name="vari">
					<option value="sininen" '. 		$sininen .'>Sininen</option>
					<option value="punainen" '. 	$punainen .'>Punainen</option>
					<option value="vihrea" '. 		$vihrea .'>Vihre&auml;</option>
					<option value="s_sininen" '. 	$s_sininen .'>S&auml;hk&ouml;nsininen</option>
					<option value="kulta" '. 		$kulta .'>Kullankeltainen</option>
					</select>
		<br>
		Teksti:<br><textarea name="teksti" rows="10" cols="30">'. $eprow['teksti'] .'</textarea>
		<br>
		Selitys: (hakukoneille)<br><textarea name="selitys" rows="4" cols="20">'. $eprow['selitys'] .'</textarea> 
		<input type="hidden" name="uid" value="'. $eprow['uid'] .'">
		<br>
		HTML: (Roope t&auml;ytt&auml;&auml;)<br><textarea name="html" rows="1" cols="10">'. $eprow['html'] .'</textarea>
		<br>
		<input type="submit" value="Tallenna">
		</form>
		<h2>tai</h2>
		<input type="button" value="Poista sivu" onClick="if(confirm(\'Haluatko varmasti poistaa koko sivun? Tätä ei voi peruuttaa!\'))window.location.href = \'poista.php?uid='. $eprow['uid'] .'\'">
		';
		}else echo "Et ole kirjautunut sis&auml;&auml;n. <a href='../'>Yrit&auml; uudellen t&auml;st&auml;.</a>";
	?>
	
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
