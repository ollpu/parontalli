<!--Kotisivut Riikka/Hevoset; /ohjaus/kuvat/uusi.php-->

<?
$rel = "../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php";



?>
<html>
<head>

<?php include $rel."skeleton/metas.php"; ?>


<title>
	Kuvat - Uusi
</title>

<?php include $rel."skeleton/styles.php"; ?>

</head>


<body>

<?php include $rel."skeleton/header.php"; ?>

<div class="nav">
	<?php
		createLink("punainen", "./index.php", "",         "Peruuta"  );
		createLink("vihrea", 	 "./", 	        "thispage", "Uusi kuva");
	?>

	<hr class="header">
</div>




<div class="content"><br>

<br/>


<?php


function checkChars($in) {
  return preg_match('/^[a-z|A-Z|0-9|_]{1,9}$/', $in);
}

function checkDupl($in, $yht) {
  return mysqli_fetch_array(mysqli_query($yht, "SELECT * FROM `images` WHERE `imgur-uid` = '$in' LIMIT 1")) == false;
}

function ranger($url){
  $headers = array("Range: bytes=0-32768");
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
function getDimensions($url) {
  $raw = ranger($url);
  $im = imagecreatefromstring($raw);
  $width = imagesx($im);
  $height = imagesy($im);
  return "{$width}x{$height}";
}


if($logged) {
	foreach(explode("\n", $_POST['images']) as $picid) {
    $picid = trim($picid);
    $large = 'http://i.imgur.com/'.$picid.'h.jpg';
    $thumb = 'http://i.imgur.com/'.$picid.'m.jpg';
    $square = 'http://i.imgur.com/'.$picid.'b.jpg';
    $size = getDimensions($large);
    $query = mysqli_query($yht, "INSERT INTO images (`imgur-uid`, `img-large`, `img-thumb`, `img-square`, `img-size`)
      VALUES ('$picid', '$large', '$thumb', '$square', '$size')");
  }
  
  
} else echo("Et ole kirjautunut sisään! Yritä uudelleen <a href='../'>tästä</a>.");
?>


</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
