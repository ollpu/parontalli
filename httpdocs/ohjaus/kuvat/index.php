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
function createImagePane($class, $href, $img)
  { echo(returnImagePane($class, $href, $img)); }
function returnImagePane($class, $href, $img) {
	return ('
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
  createPane("vihrea", "./uusi.php", "Lisää uusi");
  $animalQuery = mysqli_query($yht, "SELECT `id_name`, `short_name` FROM animals");
  while($row = mysqli_fetch_array($animalQuery)) {
    $query = mysqli_query($yht, "SELECT `imgur-uid`, `img-square` FROM images WHERE associated_animal = '{$row['id_name']}'");
    $code = "";
  	while($row_ = mysqli_fetch_array($query)) {
  		$code .= returnImagePane("sininen", "./katsele/?id=".$row_['imgur-uid'], $row_['img-square']);
  	}
    if($code != "") {
      echo("<h3 id='imagesof_{$row['id_name']}'>Kuvat eläimestä <a href='../tietokanta/katsele?id={$row['id_name']}'>{$row['short_name']}</a></h3>");
      echo($code);
    }
  }
  $query = mysqli_query($yht, "SELECT `imgur-uid`, `img-square` FROM images WHERE associated_animal = ''");
  $code = "";
  while($row = mysqli_fetch_array($query)) {
    $code .= returnImagePane("sininen", "./katsele/?id=".$row['imgur-uid'], $row['img-square']);
  }
  if($code != "") {
    echo("<h3>Kuvat, jotka eivät ole eläimestä tai eivät ole vielä luokiteltu</h3>");
    echo($code);
  }
	
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../'>tästä</a>.");
?>
</div>

</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
