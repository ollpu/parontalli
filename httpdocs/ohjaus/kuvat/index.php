<!--Kotisivut Riikka/Hevoset; /ohjaus/kuvat/index.php-->

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
		createLink("sininen",   "../", 	"", 				"Takaisin"	    );
		createLink("punainen", "./", 	"thispage", "Kuvatietokanta");
	?>

	<hr class="header">
</div>




<div class="content">

<h2>
Kuvatietokanta
</h2><br/>

<div class="paneeli img-panel">
<?php
function createImagePane($class, $href, $img) {
	echo('
		<a class="pane '.$class.'" href="'.$href.'" style="background-image: url('.$img.')">
		</a>
	');
}

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
	$query = mysqli_query($yht, "SELECT `imgur-uid`,  `img-square` FROM images");
	while($row = mysqli_fetch_array($query)) {
		createImagePane("sininen", "./katsele/?id=".$row['imgur-uid'], $row['img-square']);
	}
	createPane("vihrea", "./uusi.php", "Lisää uusi");
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../'>tästä</a>.");
?>
</div>

</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
