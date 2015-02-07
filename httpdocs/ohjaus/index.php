<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/index.html-->
<?
session_start();
include "passphrase.php";

$pwd = $_SESSION["pwd"];
	if ($pwd == $key){
		header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php' );
	}
?>
<html>
<head>
<meta charset="UTF-8">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51951207-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<title>
	Ohjaus
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="../main.css">

</head>

<body>
<div class="bg1"></div>
<div class="bg2"></div>
<br/>
<div class="header">
	<h1>Parontalli</h1><br/>
</div>

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

</body>
<html>
