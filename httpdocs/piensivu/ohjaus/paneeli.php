<!--Kotisivut Riikka/Hevoset, draft 1; /ohjaus/paneeli.php-->
<?
$yht = mysqli_connect("localhost","kavija","Hevoskavija01#!","sivusto");
mysqli_set_charset($yht, "utf8");
if (mysqli_connect_errno()) {
	echo "Virhe yhdistettäessä tietokantaan: " . mysqli_connect_error();
	end();
}
$key = md5("avain1234");
$pwd = $_COOKIE["pwd"];
	if ($pwd == $key){
		$logged = true;
		
	}else{$logged = false;}

?>
<html>
<head>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51951207-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<meta charset="UTF-8">
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
	<a class="vihrea" href="./" id="thispage">
		&nbsp;Ohjaus&nbsp;
	</a>
	&nbsp;&nbsp;
	<a class="punainen" href="./logout.php" id="">
		&nbsp;Kirjaudu ulos&nbsp;
	</a>
	<hr class="header" id="">
</div>



<div class="content">
	<h2>
Tervetuloa!
	</h2>
	
	<?
		if ($logged == true){
		if ($_GET['msg'] == "login"){$msg = "Olet nyt kirjautunut sisään!";}
		if ($_GET['msg'] == "existing"){$msg = "Tämä sivu on jo olemassa!";}
		if ($_GET['msg'] == "created"){$msg = "Uusi sivu luotiin onnistuneesti.";}
		if ($_GET['msg'] == "edited"){$msg = "Sivun muokkaus onnistui.";}
		if ($_GET['msg'] == "deleted"){$msg = "Sivun poisto onnistui.";}
		if ($_GET['msg'] == "order"){$msg = "Järjestyksen vaihto onnistui.";}
		if ($_GET['msg'] == "orderdupl"){$msg = "<span class='varoitus'>Virhe! Sivujen järjestystä ei voitu vaihtaa, koska asetit useammalle sivulle saman numeron!</span>";}
		echo '
		<p class="content">
		'. $msg .'<br>
		</p>
		<div class="paneeli">';
		$haku = mysqli_query($yht, "SELECT * FROM sivut ORDER BY id");
		while ($row = mysqli_fetch_array($haku)){
			echo '
		<a class="pane sininen" href="./muokkaa?esivu='. $row['id'] .'">
		<span class="inpane">Muokkaa sivua<br>' . $row['nimi'] . '</span>
		</a>';
		}
		echo '
		<a class="pane keltainen" href="./order.php">
		<span class="inpane">Vaihda sivujen järjestystä</span>
		</a>';
		echo '
		<a class="pane vihrea" href="./usivu.php">
		<span class="inpane">Luo uusi sivu</span>
		</a>';
		echo '</div>';
		}else echo "V&auml;&auml;r&auml; sala-avain. <a href='./'>Yrit&auml; uudellen t&auml;st&auml;.</a>";
	?>
	
</div>

</body>
<html>
