<!--Kotisivut Riikka/Hevoset, draft 1; /index.php-->
<?

include "./db.php";


$haku_fp = mysqli_query($yht, "SELECT * FROM `sivut` LIMIT 1");
$fprow = mysqli_fetch_assoc($haku_fp);



if(!isset($_GET["sivu"]) && !isset($_GET["s"]))	{$_GET['s'] = $fprow['uid'];}
if(isset($_GET["sivu"]))	{$haku_s = mysqli_query($yht, "SELECT * FROM `sivut` WHERE id = '". $_GET['sivu'] . "'");} else {
	$haku_s = mysqli_query($yht, "SELECT * FROM `sivut` WHERE uid = '". $_GET['s'] . "'");
}
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
<meta name="msvalidate.01" content="0FB9B019DA55297EDC00A30165EA3E85" />
<meta name=viewport content="width=device-width, initial-scale=1">

<?
echo '<meta name="description" content="'. $selitys .'">';
?>
<title>
	<? echo $nimi; ?>
</title>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" class="text/css" href="main.css">

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
<div class="bg1"></div>
<div class="bg2"></div>
<br/>
<div class="header">
	<h1>Parontalli</h1><br/>
</div>

<div class="nav">
	<?
	$haku = mysqli_query($yht, "SELECT * FROM sivut ORDER BY id");
	while ($row = mysqli_fetch_array($haku)){
		$thispage = "";
		if ($row['uid'] == $uid){
		$thispage = "thispage";
		}
		echo '
		<a class="'. $row['color'] .'" href="?s='. $row['uid'] .'" id="'. $thispage .'">
		&nbsp;'. $row['nimi'] .'&nbsp;
		</a>
		&nbsp;&nbsp;';
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
<br><br><br><br><br><br><br><br>
<div class="footer">
<hr>
<a href="./ohjaus">Hallinta</a> - Sivuston rakenteen tehnyt: <a href="mailto:rpsalmi@gmail.com">Roope Salmi</a>
</div>
</body>
<html>
