<!--Kotisivut Riikka/Hevoset; /template/graphic.php-->
<?

//Specify relation to / (or /httpdocs/)
$rel = "./";

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



<div class="content"><br>
	Place your content here.
</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
