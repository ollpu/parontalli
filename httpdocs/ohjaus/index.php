<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/index.html-->
<?

$rel = "../";


include "passphrase.php";


if ($logged){
	header( 'Location: ./paneeli.php' );
}
?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>

<title>
	Ohjaus
</title>

<?php include $rel."skeleton/styles.php" ?>

</head>

<body>
<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<?php
		createLink("sininen", 	"../", 	"", 				"Takaisin");
		createLink("punainen", 	"./", 	"thispage", "Ohjaus"	);
	?>

	<hr class="header" id="">
</div>

<div class="content">
	<h2>
Kirjautuminen
	</h2>
	<p class="content">
Ole hyvä ja syotä salainen kirjautumisavaimesi.
	</p>
	<form name="login" action="login.php" method="post">
		Avain: <input type="password" name="pwd"><br/>
		<input type="submit" value="Kirjaudu">
</form>
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
