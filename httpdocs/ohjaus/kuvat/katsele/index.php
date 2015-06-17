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
<?php if ($logged) {
	$picid = $_GET['id'];
	$query = mysqli_query($yht, "SELECT * FROM `images` WHERE `imgur-uid` = '$picid' LIMIT 1");
	$picture = mysqli_fetch_assoc($query); } ?>

<body>

<?php include "{$rel}skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("sininen", "../#imagesof_".$picture['associated_animal'], "", 				"Takaisin"		 );
		createLink("vihrea", 	"./", 																"thispage", "Katsele kuvaa");
	?>

	<hr class="header">
</div>


<?php include "{$rel}skeleton/photoswipe.php" ?>

<div class="content"><br>

<br/>

<?php

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

if($logged) {
  
  echo(image_gallery(array($picture)));
  
	echo("<br/><br/>
	<table class='animalDB_edit'>
		<tr>
      <td>Kopioi sijoituskoodi... </td>
			<td>
				<form name='copycode' method='GET' onsubmit='window.prompt(\"Kopioi alla oleva sijoituskoodi manuaalisesti\", \"<!--gallery $picid&nobr gallery-->\");'>
					<input type='hidden' name='id' value='$picid'/>
					<input type='submit' value='Sivulle'>
				</form>
				<form name='copycode' method='GET' onsubmit='window.prompt(\"Kopioi alla oleva sijoituskoodi manuaalisesti\", \"$picid\");'>
					<input type='hidden' name='id' value='$picid'/>
					<input type='submit' value='Eläintietokantaan'>
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
        <td>Kuva on eläimestä: </td>
        <td>
					<select name='associated_animal'>
						<option value="" <?if($picture['associated_animal'] == "") echo("selected");?>>Kuva ei ole eläimestä</option>
						<?php
							$animalQuery = mysqli_query($yht, "SELECT `id_name`, `short_name` FROM animals");
							while($row = mysqli_fetch_array($animalQuery)) {
								$selected = ($row['id_name'] == $picture['associated_animal'])? 'selected' : '';
								echo("<option value='{$row['id_name']}' $selected>{$row['short_name']}</option>");
							}
						?>
					</select>
				</td>
        <td class='desc'>Käytetään järjestelemään kuvat listanäkymässä.</td>
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
