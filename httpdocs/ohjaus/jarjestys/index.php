<!--Kotisivut Riikka/Hevoset, draft 1; /ohjaus/order.php-->
<?

$rel = "../../";



include $rel."db.php";

include $rel."ohjaus/passphrase.php";

if(!$logged) {
	exit("Et ole kirjautunut sis&auml;&auml;n!");
}

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>

<title>
	Vaihda sivujen järjestystä
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="<? print($rel) ?>main.css">

</head>

<body>
<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<a class="punainen" href="../paneeli.php" id="">
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
	<form action="./save.php" method="post" id="orderform">
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
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
