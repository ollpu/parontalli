<!--Kotisivut Riikka/Hevoset; /template/graphic_admin.php-->
<?

//Specify relation to / (or /httpdocs/)
$rel = "./";

include $rel."db.php";

include $rel."ohjaus/passphrase.php"
//$logged == true if logged in.

//Use this if you don't want to make your own notlogged (this one is quite crude)
include $rel."ohjaus/default_notlogg.php"

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
	<a class="sininen" href="./" id="thispage">
	&nbsp;Template Site&nbsp;
	</a>
	&nbsp;&nbsp;
	<hr class="header">
</div>

<!--img src="image_source" class="header"-->



<div class="content"><br>
	Place your content here.
</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
