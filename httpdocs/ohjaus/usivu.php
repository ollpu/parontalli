<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/usivu.php-->
<?

session_start();
include "passphrase.php";
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
	Uusi sivu - Ohjaus
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="../main.css">

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

</body>
<html>
