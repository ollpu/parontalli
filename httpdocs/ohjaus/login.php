<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/login.php-->

<?
	session_start();
	$hash = md5($_POST["pwd"]);
	$_SESSION["pwd"] = $hash;

?>


<html>
	<head>
		<title>Kirjaudutaan sisään...</title>
		<meta http-equiv="refresh" content="0; url=./paneeli.php?msg=login" />
	</head>
</html>
