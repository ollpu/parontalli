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

function displayAnimalById($yht, $animalid, $displayprice)
	{ echo( returnAnimalById($yht, $animalid, $displayprice)); }

function returnAnimalById($yht, $animalid, $displayprice) {
	$query = mysqli_query($yht, "SELECT * FROM `animals` WHERE id_name = '$animalid' LIMIT 1");
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
		return returnAnimal($animalid, $row['name'], $images, $row['link'], $row['sukuposti'], $row['text'], $row['price'], $displayprice);
	//if not found, display a warning message
	} else return ("<br><span class='varoitus'>Varoitus!</span> Pyytämääsi eläintä ('$animalid') ei löytynyt tietokannasta!</br>");
}

function returnAnimal($id, $name, $images, $links, $sukuposti, $text, $price, $displayprice) {
	$toReturn = "";
	//Title
	$toReturn .= ("
	<h2 id='animal$id'>$name</h2><br/>
	");
	//Images, in rows
	if(count($images)) foreach($images as $imagerow) {
		$toReturn .= ("
		<div class='img img".count($imagerow)."'>
		");
		foreach($imagerow as $image) {
			$toReturn .= ("
			<img src='$image'> ");
		}
		$toReturn .= ("
		</div><br/>
		");
	}
	$toReturn .= ("
	");
	if($links != "") {
		$toReturn .= ("
		$links
		<br/>
		");
	}
	if($sukuposti != "") {
		$toReturn .= ("<br/><a href='$sukuposti'>Sukuposti</a><br/>
		");
	}
	$toReturn .= (nl2br($text));
	$toReturn .= ("
	<br/><br/>
	");
	if($displayprice) {
		$toReturn .= (nl2br($price));
	}
	
	return $toReturn;
	
}

?>
