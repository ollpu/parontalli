<div class="bg1"></div>
<div class="bg2"></div>
<br/>
<div class="header">
	<h1>Parontalli</h1>
	<?
		if(substr($_SERVER[REQUEST_URI], 0, 4) == '/dev') {
			echo("Olet /dev/ sivuilla.
Näillä sivuilla kokeillaan kehitystyön alla olevia toimintoja, joten jotkin toiminnot voivat olla epävakaita.");
		}
	?>
	<br/>
</div>
<?php

function createLink($color, $target, $thispage, $nimi) {
	echo '<a class="'. $color .'" href="'. $target .'" id="'. $thispage .'">
	&nbsp;'. $nimi .'&nbsp;
	</a>
	&nbsp;&nbsp;
	';
}

//TODO!
//function returnAnimalById($animalid) {
//
//}

function displayAnimalById($yht, $animalid, $displayprice) {
	$query = mysqli_query($yht, "SELECT * FROM `animals` WHERE id_name = '".$animalid."' LIMIT 1");
	$row = mysqli_fetch_assoc($query);
	if($row['id_name'] != '') {
		$imagerows = array();
		if(trim($row['img']) != '') {
			$imagerows = explode("\n", trim($row['img']));
			$images = array();
			foreach($imagerows as $key => $imagerow) {
				$images[$key] = explode(',', $imagerow);
			}
		}
		displayAnimal(1, $row['name'], $images, $row['link'], $row['sukuposti'], $row['text'], $row['price'], $displayprice);
	//if not found, display a warning message
	} else echo("<br><span class='varoitus'>Varoitus!</span> Pyytämääsi eläintä ('$animalid') ei löytynyt tietokannasta!</br>");
}

function displayAnimal($id, $name, $images, $links, $sukuposti, $text, $price, $displayprice) {
	//Title
	echo("
	<h2 id='otsikko$id'>$name</h2><br/>
	");
	//Images, in rows
	if(count($images)) foreach($images as $imagerow) {
		echo("
		<div class='img img".count($imagerow)."'>
		");
		foreach($imagerow as $image) {
			echo("
			<img src='$image'> ");
		}
		echo("
		</div><br/>
		");
	}
	echo("
	");
	if($links != "") {
		echo("
		$links
		<br/>
		");
	}
	if($sukuposti != "") {
		echo("<br/><a href='$sukuposti'>Sukuposti</a><br/>
		");
	}
	echo(nl2br($text));
	echo("
	<br/><br/>
	");
	if($displayprice) {
		echo(nl2br($price));
	}
	
}

?>
