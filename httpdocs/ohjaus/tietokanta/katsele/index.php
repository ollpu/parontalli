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
	<table border='2'>
		<tr>
			
			<td>
				<form name='muokkaa' action='../muokkaa/?id=$animalid'>
					<input type='submit' value='Muokkaa' />
				</form>
			</td>
			
			<td>
				<form name='copycode' onsubmit='window.prompt(\"Kopioi sijoituskoodi\", \"<!---->\");'>
					<input type='submit' value='Kopio sijoituskoodi'>
				</form>
			</td>
			
		</tr>
	</table>
	");
	
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
