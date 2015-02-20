<!--Kotisivut Riikka/Hevoset, draft 1; /index.php-->
<?


$rel = "./";

include $rel."db.php";


$haku_fp = mysqli_query($yht, "SELECT * FROM `sivut` LIMIT 1");
$fprow = mysqli_fetch_assoc($haku_fp);


//Go to first page in order (front page) if ?s argument is not set
if(!isset($_GET["s"]))	{$_GET['s'] = $fprow['uid'];}


$haku_s = mysqli_query($yht, "SELECT * FROM `sivut` WHERE uid = '". $_GET['s'] . "'");


$pagerow = mysqli_fetch_assoc($haku_s);


$kuva = $pagerow["kuva"];
$teksti = $pagerow["teksti"];
$nimi = $pagerow["nimi"];
$html = $pagerow["html"];
$selitys = $pagerow["selitys"];
$uid = $pagerow["uid"];

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>


<?
echo '<meta name="description" content="'. $selitys .'">';
?>
<title>
	<? echo $nimi; ?>
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="<? print($rel); ?>main.css">

</head>

<script>
function execRnav()
{
	if (typeof rnavPosByHeader == 'function') {rnavPosByHeader();}
}
function runHandles()
{
	if (typeof addHandles() == 'function') {addHandles();}
}
</script>

<body onresize="execRnav();" onscroll="execRnav();" onload="runHandles();">

<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<?
	$haku = mysqli_query($yht, "SELECT * FROM sivut ORDER BY id");
	while ($row = mysqli_fetch_array($haku)){
		$thispage = "";
		if ($row['uid'] == $uid){
			$thispage = "thispage";
		}
		createLink($row['color'], $row['uid'], $thispage, $row['nimi']);
	}
	?>
	<hr class="header" id="">
</div>
<?
if (!$kuva == ""){
	echo '
	<img src="'. $kuva .'" class="header">
	';
}

echo $html;

?>
<div class="content"><br>
	<?
	$teksti = nl2br($teksti);
	echo $teksti;
	?>
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
