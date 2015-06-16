<!--Kotisivut Riikka/Hevoset; /ohjaus/tietokanta/katsele/index.php-->

<?
$rel = "../../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php";



?>
<html>
<head>

<?php include $rel."skeleton/metas.php"; ?>


<title>
	Tietokanta - Katsele
</title>

<?php include $rel."skeleton/styles.php"; ?>

</head>


<body>

<?php include $rel."skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("sininen", "../", 	"", 				"Takaisin"			 );
		createLink("vihrea", 	"./", 	"thispage", "Katsele eläintä");
	?>

	<hr class="header">
</div>




<div class="content"><br>

<br/>


<?php

function image_gallery($images = array()) {
	if(count($images)) {
		$toReturn = "
			<div class='img-gallery img' itemscope itemtype='http://schema.org/ImageGallery'>";
		foreach ($images as $picture) {
			$toReturn .= "<figure itemprop='associatedMedia' itemscope itemtype='http://schema.org/ImageObject'>
				<a href='".$picture['img-large']."' itemprop='contentUrl' data-size='".$picture['img-size']."'>
					<img src='".$picture['img-thumb']."' itemprop='thumbnail' alt='".$picture['text']."' />
				</a>
				<figcaption itemprop='caption description'>".$picture['text'];
				if($picture['author'] != "") $toReturn .= "<br/><small>Kuva: ".$picture['author']."</small>";
				$toReturn .= "</figcaption>
				";
			if($picture['break-row']) $toReturn .= "<br/>";
			$toReturn .= "</figure>";
		}
		$toReturn .= "</div>";
		return $toReturn;
	}
}

function image_exists($id, $yht) {
	return mysqli_fetch_array(mysqli_query($yht, "SELECT `imgur-uid` FROM images WHERE `imgur-uid` = '$id' LIMIT 1")) !== false;
}
function get_image_by_id($id, $yht) {
	return mysqli_fetch_assoc(mysqli_query($yht, "SELECT * FROM images WHERE `imgur-uid` = '$id' LIMIT 1"));
}

function generate_gallery($text, $yht) {
	$idArray = explode('*', $text);
	$images = array();
	foreach ($idArray as $rid) {
		$attributes = explode('&', $rid);
		$id = $attributes[0];
		if (image_exists($id, $yht)) {
			$images[$id] = get_image_by_id($id, $yht);
			$images[$id]['break-row'] = $attributes[1] == "br";
		}
	}
	return image_gallery($images);
}

if($logged) {
	include "../animaldb_generate.php";
	include "{$rel}skeleton/photoswipe.php";
	$animalid = $_GET['id'];
	echo(preg_replace_callback(
		"/\\<!-+gallery (.+?) gallery-+\\>/",
		function ($matches) use ($yht) {
			return generate_gallery($matches[1], $yht);
		},
		returnAnimalById($yht, $animalid, true)
	));
	echo("<br/><br/>
	<table border='0'>
		<tr>
			
			<td>
				<form name='muokkaa' action='../muokkaa/' method='GET'>
					<input type='hidden' name='id' value='$animalid'/>
					<input type='submit' value='Muokkaa' />
				</form>
			</td>
			
			<td>
				<form name='copycode' method='GET' onsubmit='window.prompt(\"Kopioi alla oleva sijoituskoodi manuaalisesti\", \"<!--$animalid&true-->\");'>
					<input type='hidden' name='id' value='$animalid'/>
					<input type='submit' value='Kopio sijoituskoodi, näytä hinta'>
				</form>
			</td>
			
			<td>
				<form name='copycode' method='GET' onsubmit='window.prompt(\"Kopioi alla oleva sijoituskoodi manuaalisesti\", \"<!--$animalid&false-->\");'>
					<input type='hidden' name='id' value='$animalid'/>
					<input type='submit' value='Kopio sijoituskoodi, älä näytä hintaa'>
				</form>
			</td>
			
			
	</table>
	");
	
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
