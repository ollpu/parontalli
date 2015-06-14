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
  //TODO: Move this function
  function image_gallery($images = array()) {
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
?>

<?php if($logged) {
  $picid = $_GET['id'];
  $query = mysqli_query($yht, "SELECT * FROM `images` WHERE `imgur-uid` = '$picid' LIMIT 1");
	$picture = mysqli_fetch_assoc($query);
  
  echo(image_gallery(array($picture)));
  
	echo("<br/><br/>
	<table class='animalDB_edit'>
		<tr>
      <td></td>
			<td>
				<form name='copycode' method='GET' onsubmit='window.prompt(\"Kopioi alla oleva sijoituskoodi manuaalisesti\", \"<!--$picid-->\");'>
					<input type='hidden' name='id' value='$picid'/>
					<input type='submit' value='Kopio sijoituskoodi'>
				</form>
			</td>
		</tr>
	");
  ?>
    <form name='edit' method='POST' action='./tallenna.php'>
      <input type='hidden' name='imgur-uid' value='<?echo($picid);?>' />
      <tr>
        <td>Otsikko/Teksti: </td>
        <td><textarea name='text' rows='3' cols='34'><?echo(htmlspecialchars($picture['text']));?></textarea></td>
        <td class='desc'>Näytetään kuvan alapuolella.</td>
      </tr>
      <tr>
        <td>Kuvaaja: </td>
        <td><input type='text' name='author' value='<?echo(htmlspecialchars($picture['author']))?>'/></td>
        <td class='desc'>Voi sisältää myös esimerkiksi kuvauspäivämäärän.</td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type='submit' name='save' value='Tallenna'>
          <input type='button' value='Poista'
            onClick='if(confirm("Haluatko varmasti poistaa tämän kuvan? Tätä ei voi peruuttaa! Sijoituskoodit jätetään sivuille."))
              window.location.href = "poista.php?id=<?echo($picid);?>";
          '>
        </td>
      </tr>
    </form>
  </table>
  <?php
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
