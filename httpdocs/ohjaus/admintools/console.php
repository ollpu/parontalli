<!--Kotisivut Riikka/Hevoset; /ohjaus/admintools/console.php-->
<?

//Specify relation to / (or /httpdocs/)
$rel = "../../";

include $rel."db.php";

include $rel."ohjaus/passphrase.php"
//$logged == true if logged in.



?>
<html>
<head>

<?php include $rel."skeleton/metas.php" ?>


<title>
	Atools: Console
</title>

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<link rel="stylesheet" class="text/css" href="<? print($rel); ?>main.css">

</head>


<body>

<?php include $rel."skeleton/header.php" ?>

<div class="nav">
	<a class="sininen" href="./" id="thispage">
	&nbsp;Konsoli&nbsp;
	</a>
	&nbsp;&nbsp;
	<hr class="header">
</div>

<!--img src="image_source" class="header"-->



<div class="content"><br>
	<?php
	if($logged) {
		if($_POST['locate']) {
			$_POST['curdir'] = $_POST['curdir'] . $_POST['locate'];
		}
		if($_POST['resdir']) {
			$_POST['curdir'] = "./";
		}
		echo(nl2br(shell_exec("cd ./".$_POST['curdir']." && ".$_POST['command'])));
	}
	?>
	<br>
	<form name="cmd_in" action="./console.php" method="POST">
		<input type="text" name="command"/><br>
		<input type="hidden" name="curdir" value="<?echo($_POST['curdir']);?>"/>
	</form><br/>
	<form name="cd" action="./console.php" method="POST">
		cd: <input type="text" name="locate"/>
		<input type="hidden" name="curdir" value="<?echo($_POST['curdir']);?>"/>
	</form><br/>
	<form name="resetd" action="./console.php" method="POST">
		<input type="submit" text="Tyhjennä">
		<input type="hidden" name="resdir" value="1">
	</form>
</div>

<?php include $rel."skeleton/footer.php" ?>

</body>
<html>
