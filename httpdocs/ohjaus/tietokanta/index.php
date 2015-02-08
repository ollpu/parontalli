<!--Kotisivut Riikka/Hevoset; /ohjaus/tietokanta/index.php-->

<?
$rel = "../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php"



?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>


<title>
	Ohjaus - Tietokanta
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
	&nbsp;Tietokanta&nbsp;
	</a>
	&nbsp;&nbsp;
	<hr class="header">
</div>




<div class="content"><br>

<h2>
Eläinten tietokanta
</h2><br/>

<div class="paneeli mini">
<?php
if($logged) {
	$query = mysqli_query($yht, "SELECT * FROM animals");
	while($row = mysqli_fetch_array($query)) {
		echo('
		<a class="pane vihrea">
		<span class="inpane">
		Katsele tietoja kohteesta '.$row['id_name'].'
		</span>
		</a>
		');
	}
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../'>tästä</a>.");
?>
</div>

</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
