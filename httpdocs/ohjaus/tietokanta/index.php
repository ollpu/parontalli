<!--Kotisivut Riikka/Hevoset; /ohjaus/tietokanta/index.php-->

<?
$rel = "../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php";



?>
<html>
<head>

<?php include $rel."skeleton/metas.php"; ?>


<title>
	Ohjaus - Tietokanta
</title>

<?php include $rel."skeleton/styles.php"; ?>

</head>


<body>

<?php include $rel."skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("sininen", "../", 	"", 				"Takaisin"	);
		createLink("vihrea", 	"./", 	"thispage", "Tietokanta");
	?>

	<hr class="header">
</div>




<div class="content">

<h2>
Eläinten tietokanta
</h2><br/>

<div class="paneeli mini">
<?php
function createPane($class, $href, $text) {
	echo('
		<a class="pane '.$class.'" href="'.$href.'">
		<span class="inpane">
		'. $text .'
		</span>
		</a>
	');
}

if($logged) {
	$query = mysqli_query($yht, "SELECT * FROM animals");
	while($row = mysqli_fetch_array($query)) {
		createPane("sininen", "./katsele/?id=".$row['id_name'], $row['id_name']);
	}
	createPane("vihrea", "./uusi.php", "Luo uusi kohta tietokantaan");
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../'>tästä</a>.");
?>
</div>

</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
