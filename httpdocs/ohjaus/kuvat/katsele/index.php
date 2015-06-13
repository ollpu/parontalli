<!--Kotisivut Riikka/Hevoset; /ohjaus/kuvat/katsele/index.php-->

<?
$rel = "../../../";

include "{$rel}db.php";

include "{$rel}ohjaus/passphrase.php";



?>
<html>
<head>

<?php include "{$rel}skeleton/metas.php"; ?>


<title>
	Tietokanta - Katsele
</title>

<?php include "{$rel}skeleton/styles.php"; ?>

</head>


<body>

<?php include "{$rel}skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("sininen", "../", 	"", 				"Takaisin"		 );
		createLink("vihrea", 	"./", 	"thispage", "Katsele kuvaa");
	?>

	<hr class="header">
</div>


<?php include "{$rel}skeleton/photoswipe.php" ?>

<div class="content"><br>

<br/>
<?php
  //TODO: Move these functions
  function ranger($url){
    $headers = array("Range: bytes=0-32768");
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
  }
  function getDimensions($url) {
    $raw = ranger($url);
    $im = imagecreatefromstring($raw);
    $width = imagesx($im);
    $height = imagesy($im);
    return "{$width}x{$height}";
  }
  
  function image_gallery($images = array()) {
    $toReturn = "
      <div class='img-gallery img' itemscope itemtype='http://schema.org/ImageGallery'>";
    foreach ($images as $picture) {
      $toReturn .= "<figure itemprop='associatedMedia' itemscope itemtype='http://schema.org/ImageObject'>
        <a href='".$picture['img-large']."' itemprop='contentUrl' data-size='".$picture['img-size']."'>
          <img src='".$picture['img-thumb']."' itemprop='thumbnail' alt='Image description' />
        </a>
        <figcaption itemprop='caption description'>".$picture['text']."
          <br/><small>Kuvannut: ".$picture['author']."</small>
        </figcaption>
        ";
      if($picture['break-row']) $toReturn .= "<br/>";
      $toReturn .= "</figure>";
    }
    $toReturn .= "</div>";
    return $toReturn;
  }
?>

<?php if($logged) {
  $picid = $_GET['id'];
  $query = mysqli_query($yht, "SELECT * FROM `images` WHERE `imgur-uid` = '$picid' LIMIT 1");
	$picture = mysqli_fetch_assoc($query);
  
  echo(image_gallery(array($picture)));
  
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
