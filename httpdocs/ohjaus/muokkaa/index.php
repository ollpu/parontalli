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

<?php include $rel."skeleton/styles.php" ?>

</head>

<body>

<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<?php
		createLink("sininen", 	"../", 	"", 				"Takaisin");
		createLink("punainen", 	"./", 	"thispage", "Muokkaa"	);
	?>

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

		$punainen = $eprow['color'] == "punainen" ? "selected" : "";
		$sininen = $eprow['color'] == "sininen" ? "selected" : "";
		$vihrea = $eprow['color'] == "vihrea" ? "selected" : "";
		$s_sininen = $eprow['color'] == "s_sininen" ? "selected" : "";
		$kulta = $eprow['color'] == "kulta" ? "selected" : "";

		echo '
		<a href="../paneeli.php">Peruuta</a><br>
		<form name="esivu" action="tallenna.php" method="post">
		Sivun nimi: <input type="text" name="nimi" value="'. htmlspecialchars($eprow['nimi']) .'"><br>
		Kuva (URL): <input type="text" name="kuva" value="'. $eprow['kuva'] .'"><br>
		Väri: <select name="vari">
						<option value="sininen" '. 		$sininen .'>Sininen</option>
						<option value="punainen" '. 	$punainen .'>Punainen</option>
						<option value="vihrea" '. 		$vihrea .'>Vihreä</option>
						<option value="s_sininen" '. 	$s_sininen .'>Sähkönsininen</option>
						<option value="kulta" '. 		$kulta .'>Kullankeltainen</option>
					</select>
		<br>
		Teksti:<br><textarea name="teksti" rows="10" cols="30">&'. htmlspecialchars($eprow['teksti']) .'</textarea>
		<br>
		Selitys: (hakukoneille)<br><textarea name="selitys" rows="4" cols="20">'. $eprow['selitys'] .'</textarea>
		<input type="hidden" name="uid" value="'. $eprow['uid'] .'">
		<br>
		HTML: (Roope täyttää)<br><textarea name="html" rows="1" cols="10">'. htmlspecialchars($eprow['html']) .'</textarea>
		<br>
		<input type="submit" value="Tallenna">
		</form>
		<h2>tai</h2>
		<input type="button" value="Poista sivu" onClick="if(confirm(\'Haluatko varmasti poistaa koko sivun? Tätä ei voi peruuttaa!\'))window.location.href = \'poista.php?uid='. $eprow['uid'] .'\'">
		';
		} else echo "Et ole kirjautunut sisään. <a href='../'>Yritä uudellen tästä.</a>";
	?>

</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
