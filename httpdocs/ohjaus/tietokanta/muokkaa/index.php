<!--Kotisivut Riikka/Hevoset; /ohjaus/tietokanta/muokkaa/index.php-->

<?
$rel = "../../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php";



?>
<html>
<head>

<?php include $rel."skeleton/metas.php"; ?>


<title>
	Tietokanta - Muokkaa
</title>

<?php include $rel."skeleton/styles.php"; ?>

</head>


<body>

<?php include $rel."skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("punainen", "../katsele/?id=".$_GET['id'], "", "Peruuta"      );
		createLink("vihrea", 	"./", 	"thispage", "Muokkaa eläintä tietokannassa");
	?>

	<hr class="header">
</div>




<div class="content"><br>

<br/>


<?php


if($logged) {
	$animalid = $_GET['id'];
  
  $query = mysqli_query($yht, "SELECT * FROM `animals` WHERE id_name = '".$animalid."' LIMIT 1");
	$row = mysqli_fetch_assoc($query);
	
  echo("
  <form name='edit' method='POST' action='./tallenna.php'>
  	<table border='0'>
  		<tr>
  			<td>Nimi: </td>
        <td><input type='text' value='$animalid' disabled/></td>
				<input type='hidden' name='id_name' value='$animalid'>
        <td>&nbsp&nbspEläimen \"kutsumanimi\" (ei koskaan näytetä kävijälle).</td>
  		</tr>
			<tr>
  			<td>Lyhyt nimi: </td>
        <td><input type='text' value='". $row['short_name'] ."' name='short_name'/></td>
        <td>&nbsp&nbspLyhyt versio eläimen nimestä. Tämä versio ilmestyy sivujen oikeaan navigointipalkkiin. Lyhyempi parempi!</td>
  		</tr>
      <tr>
        <td>Otsikko: </td>
        <td><input type='text' name='name' value='". htmlspecialchars($row['name']) ."'/></td>
      </tr>
      <tr>
        <td>Kuvat: </td>
        <td><textarea name='img' rows='3' cols='31'>". htmlspecialchars($row['img']) ."</textarea></td>
        <td>&nbsp&nbspKuvia eläimestä (linkkeinä). Erota kuvat pilkuilla (\",\") ja rivit rivinvaihdoilla. Yhdellä rivillä voi olla enintään 4 kuvaa.</td>
      </tr>
      <tr>
        <td>Linkit:</td>
        <td><textarea name='link' rows='2' cols='31'>". htmlspecialchars($row['link']) ."</textarea></td>
      </tr>
      <tr>
        <td>Sukuposti-linkki: </td>
        <td><input type='text' name='sukuposti' value='". htmlspecialchars($row['sukuposti']) ."'/></td>
        <td>&nbsp&nbspJätä tyhjäksi jos ei ole.</td>
      </tr>
      <tr>
        <td>Leipäteksti: </td>
        <td><textarea name='text' rows='10' cols='31'>". htmlspecialchars($row['text']) ."</textarea></td>
      </tr>
      <tr>
        <td>Hinta: </td>
        <td><textarea name='price' rows='2' cols='31'>". htmlspecialchars($row['price']) ."</textarea></td>
        <td>&nbsp&nbspVoit valita sijoituskohtaisesti, näytetäänkö hintaa vai ei.</td>
      </tr>
      <tr>
        <td></td>
        <td style='text-align: center; '>
          <input type='submit' name='save' value='Tallenna'>
          <input type='button' value='Poista'
            onClick='if(confirm(\"Haluatko varmasti poistaa eläimen $animalid? Tätä ei voi peruuttaa! Sijoituskoodit jätetään sivuille.\"))
              window.location.href = \"poista.php?id=$animalid\";
          '>
        </td>
      </tr>
  	</table>
  </form>
	");
	
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
