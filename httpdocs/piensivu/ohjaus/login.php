<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/login.php-->

<?
	setcookie("pwd", "", time()-3600);
    $hash = md5($_POST["pwd"]);
	setcookie("pwd", $hash, time()+3600);
	header( 'Location: http://www.parontalli.fi/ohjaus/paneeli.php?msg=login' );

?>
