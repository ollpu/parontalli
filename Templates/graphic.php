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

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<link rel="stylesheet" class="text/css" href="<? print($rel); ?>main.css">

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
