<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/index.html-->
<?

$rel = "../";

session_start();
include "passphrase.php";

$pwd = $_SESSION["pwd"];
	if ($pwd == $key){
		header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php' );
	}
?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>

<title>
	Ohjaus
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="<? print($rel); ?>main.css">

</head>

<body>
<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<a class="sininen" href="../" id="">
		&nbsp;Takaisin&nbsp;
	</a>
	&nbsp;&nbsp;
	<a class="punainen" href="./" id="thispage">
		&nbsp;Ohjaus&nbsp;
	</a>
	<hr class="header" id="">
</div>

<div class="content">
	<h2>
Kirjautuminen
	</h2>
	<p class="content">
Ole hyv&auml; ja sy&ouml;t&auml; salainen kirjautumisavaimesi.
	</p>
	<form name="login" action="login.php" method="post">
		Avain: <input type="password" name="pwd"><br/>
		<input type="submit" value="Kirjaudu">
</form> 
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
