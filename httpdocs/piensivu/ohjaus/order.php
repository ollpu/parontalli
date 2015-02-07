<!--Kotisivut Riikka/Hevoset, draft 1; /ohjaus/order.php-->
<?
$yht = mysqli_connect("localhost","kavija","Hevoskavija01#!","sivusto");
mysqli_set_charset($yht, "utf8");
if (mysqli_connect_errno()) {
	echo "Virhe yhdistettäessä tietokantaan: " . mysqli_connect_error();
	exit();
}
$key = md5("avain1234");
$pwd = $_COOKIE["pwd"];
	if ($pwd == $key){
		$logged = true;
		
	}else{$logged = false; exit("Et ole kirjautunut sis&auml;&auml;n!");}

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
	Vaihda sivujen järjestystä
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
	<a class="punainen" href="./paneeli.php" id="">
		&nbsp;Peruuta&nbsp;
	</a>
	&nbsp;&nbsp;
	<a class="vihrea" href="./" id="thispage">
		&nbsp;Vaihda sivujen järjestystä&nbsp;
	</a>
	&nbsp;&nbsp;
	<hr class="header" id="">
</div>



<div class="content">
	<script>
		function changeOrder(curVal, oriVal) {
			var elm = document.getElementById(oriVal);
			elm.style.order = curVal;
	</script>
	<form action="./s_order.php" method="post" id="orderform">
		<div style="display: flex;" id="flex">
		<?
		$haku = mysqli_query($yht, "SELECT * FROM sivut ORDER BY id");
		
		$ordnum = 0;
		while ($row = mysqli_fetch_array($haku)){
			$ordnum++;
			echo '<span id="'.$row['id'].'" style="order: '.$ordnum.'"><label>'.$row['nimi'].'</label> <input type="number" name="'.$row['id'].'" value="'.$row['id'].'" onchange="changeOrder(this.value, '.$row['id'].')"><br></span>
			';
		}
		?>
		</div>
		<input type="submit" value="Tallenna">
	</form>
</div>

</body>
<html>
