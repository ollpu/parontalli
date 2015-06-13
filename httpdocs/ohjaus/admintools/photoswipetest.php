

<!--Kotisivut Riikka/Hevoset; /template/graphic.php-->
<?

//Specify relation to / (or /httpdocs/)
$rel = "../../";

include $rel."db.php";

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>


<title>
	Template
</title>

<?php include $rel."skeleton/styles.php" ?>

</head>


<body>

<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<?php
		createLink("sininen", "./", "thispage", "Template Site");
	?>

	<hr class="header">
</div>

<!--img src="image_source" class="header"-->

<? include $rel.'skeleton/photoswipe.php' ?>

<div class="content"><br>
  
  <?php
    function ranger($url){
      $headers = array(
      "Range: bytes=0-32768"
      );

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
    
  ?>
  
  <div class="img-gallery img" itemscope itemtype="http://schema.org/ImageGallery">

    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="http://i.imgur.com/Uk36p9oh.jpg" itemprop="contentUrl" data-size="<? echo(getDimensions('http://i.imgur.com/Uk36p9oh.jpg')); ?>">
        <img src="http://i.imgur.com/Uk36p9om.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Kuva 1.</figcaption>
      <br/>
    </figure>
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="http://i.imgur.com/a3ESsFPh.jpg" itemprop="contentUrl" data-size="<? echo(getDimensions('http://i.imgur.com/a3ESsFPh.jpg')); ?>">
        <img src="http://i.imgur.com/a3ESsFPm.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Kuva 2.</figcaption>
    </figure>


  </div>
  
  <div class="img-gallery img" itemscope itemtype="http://schema.org/ImageGallery">

    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="http://i.imgur.com/Uk36p9oh.jpg" itemprop="contentUrl" data-size="<? echo(getDimensions('http://i.imgur.com/Uk36p9oh.jpg')); ?>">
        <img src="http://i.imgur.com/Uk36p9om.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Kuva 1.</figcaption>
    </figure>

    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="http://i.imgur.com/a3ESsFPh.jpg" itemprop="contentUrl" data-size="<? echo(getDimensions('http://i.imgur.com/a3ESsFPh.jpg')); ?>">
        <img src="http://i.imgur.com/a3ESsFPm.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Kuva 2.</figcaption>
    </figure>


  </div>

  
  
  

</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
