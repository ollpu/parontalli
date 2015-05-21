<!--Kotisivut Riikka/Hevoset; /template/graphic_admin.php-->
<?

//Specify relation to / (or /httpdocs/)
$rel = "./";

include $rel."db.php";

include $rel."ohjaus/passphrase.php";
//$logged == true if logged in.

//Use this if you don't want to make your own notlogged (this one is quite crude)
include $rel."ohjaus/default_notlogg.php";

?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>


<title>
	Template
</title>

<?php include $rel."skeleton/styles.php"; ?>

</head>


<body>

<?php include $rel."skeleton/header.php"; ?>

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
