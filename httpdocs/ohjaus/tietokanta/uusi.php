<!--Kotisivut Riikka/Hevoset; /ohjaus/tietokanta/uusi.php-->

<?
$rel = "../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php";



?>
<html>
<head>

<?php include $rel."skeleton/metas.php"; ?>


<title>
	Tietokanta - Uusi
</title>

<?php include $rel."skeleton/styles.php"; ?>

</head>


<body>

<?php include $rel."skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("punainen", "./index.php", "",         "Peruuta"                );
		createLink("vihrea", 	 "./", 	        "thispage", "Uusi eläin tietokantaan");
	?>

	<hr class="header">
</div>




<div class="content"><br>

<br/>


<?php

function parseEntry($in) {
  return (strlen($in) >= 1 && strlen($in) <= 24) && !preg_match('/[^a-z|A-Z|0-9|_]/', $in);
}


if($logged) {
	$animalid = $_GET['id'];
  
  if(!isset($_GET['id'])) {
    
    $query = mysqli_query($yht, "SELECT * FROM `animals` WHERE id_name = '".$animalid."' LIMIT 1");
  	$row = mysqli_fetch_assoc($query);
  	echo("Syötä eläimelle kutsumanimi. Tätä nimeä käytetään erottamaan eläimet tietokannassa,"
      ." joten se ei saa olla sama kuin jollain toisella olemassaolevalla eläimellä.
      <br>Tämä nimi ei saa sisältää ääkkösiä tai muita erikoismerkkejä (Sallitut merkit A-Z, a-z, 0-9, _). Se saa olla vähintään 1 ja enintään 24 merkkiä pitkä."
    );
    echo("
    <form name='edit' method='GET' action='./uusi.php'>
    	<table border='0'>
    		<tr>
    			<td>Nimi: </td>
          <td><input type='text' name='id' value='$animalid'/></td>
          <td>&nbsp&nbspEläimen \"kutsumanimi\" (ei koskaan näytetä kävijälle).</td>
    		</tr>
        <tr>
          <td></td>
          <td style='text-align: center; '>
            <input type='submit' value='Luo'>
          </td>
        </tr>
    	</table>
    </form>
  	");
	} else {
    echo(parseEntry($animalid));
  }
  
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
