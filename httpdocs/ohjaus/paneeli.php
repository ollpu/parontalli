<!--Kotisivut Riikka/Hevoset, draft 1; /ohjaus/paneeli.php-->
<?

$rel = "../";

include $rel."db.php";


include "passphrase.php";

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>


<title>
	Ohjaus
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
	<a class="vihrea" href="./" id="thispage">
		&nbsp;Ohjaus&nbsp;
	</a>
	&nbsp;&nbsp;
	<a class="punainen" href="./logout.php" id="">
		&nbsp;Kirjaudu ulos&nbsp;
	</a>
	<hr class="header" id="">
</div>



<div class="content">
	<h2>
Tervetuloa!
	</h2>
	
	<?
		if ($logged == true){
			if ($_GET['msg'] == "login")	{$msg = "Olet nyt kirjautunut sisään!";}
			if ($_GET['msg'] == "existing")	{$msg = "Tämä sivu on jo olemassa!";}
			if ($_GET['msg'] == "created")	{$msg = "Uusi sivu luotiin onnistuneesti.";}
			if ($_GET['msg'] == "edited")	{$msg = "Sivun muokkaus onnistui.";}
			if ($_GET['msg'] == "deleted")	{$msg = "Sivun poisto onnistui.";}
			if ($_GET['msg'] == "orderdupl"){$msg = "<span class='varoitus'>Virhe! Sivujen järjestystä ei voitu vaihtaa, koska asetit useammalle sivulle saman arvon!</span>";}
			if ($_GET['msg'] == "order")	{$msg = "Järjestyksen vaihto onnistui.";}
			echo '
			<p class="content">
			'. $msg .'<br>
			</p>
			<div class="paneeli">';
			$haku = mysqli_query($yht, "SELECT * FROM sivut ORDER BY id");
			while ($row = mysqli_fetch_array($haku)){
				echo '
				<a class="pane sininen" href="./muokkaa?es='. $row['uid'] .'">
				<span class="inpane">Muokkaa sivua<br>' . $row['nimi'] . '</span>
				</a>';
			}
			echo '
			<a class="pane keltainen" href="./jarjestys/">
			<span class="inpane">Vaihda sivujen järjestystä</span>
			</a>';
			echo '
			<a class="pane vihrea" href="./usivu.php">
			<span class="inpane">Luo uusi sivu</span>
			</a>';
			echo '</div>';
		}else echo "Väärä sala-avain. <a href='./'>Yritä uudellen tästä.</a>";
	?>
	
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
