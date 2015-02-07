<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/muokkaa/index.php-->
<?

include "../../db.php";
if (mysqli_connect_errno()) {
	echo "Virhe yhdistettäessä tietokantaan: " . mysqli_connect_error();
	end();
}

session_start();
include "../passphrase.php";
$pwd = $_SESSION["pwd"];

$logged = $pwd == $key;
?>
<html>
<head>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51951207-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<meta charset="UTF-8">
<title>
	Muokkaa - Ohjaus
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="../../main.css">

</head>

<body>
<div class="bg1"></div>
<div class="bg2"></div>
<br/>
<div class="header">
	<h1>Parontalli</h1><br/>
</div>

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
		$haku_ep = mysqli_query($yht, "SELECT * FROM sivut WHERE id = '". $_GET['esivu'] ."'");
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
		V&auml;ri: <select name="vari">
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
		<input type="hidden" name="id" value="'. $eprow['id'] .'">
		<br>
		HTML: (Roope t&auml;ytt&auml;&auml;)<br><textarea name="html" rows="1" cols="10">'. $eprow['html'] .'</textarea>
		<br>
		<input type="submit" value="Tallenna">
		</form>
		<h2>tai</h2>
		<input type="button" value="Poista sivu" onClick="if(confirm(\'Haluatko varmasti poistaa koko sivun? T&auml;t&auml; ei voi peruuttaa!\'))window.location.href = \'poista.php?id='. $eprow['id'] .'\'">
		';
		}else echo "Et ole kirjautunut sis&auml;&auml;n. <a href='../'>Yrit&auml; uudellen t&auml;st&auml;.</a>";
	?>
	
</div>

</body>
<html>
