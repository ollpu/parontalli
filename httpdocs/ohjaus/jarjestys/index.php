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

<?php include $rel."skeleton/styles.php" ?>

</head>

<body>
<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<?php
		createLink("punainen", "../paneeli.php", "", "Peruuta");
		createLink("vihrea", "./", "thispage", "Vaihda sivujen järjestystä");
	?>

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
