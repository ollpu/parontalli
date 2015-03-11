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
	Ohjaus - Tietokanta
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


if($logged) {
	$animalid = $_GET['id'];
	displayAnimalById($yht, $animalid, true);
	echo("<br/><br/>
	<table border='0'>
		<tr>
			
			<td>
				<form name='muokkaa' action='../muokkaa/?id=$animalid'>
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
			
		</tr>
	</table>
	");
	
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
