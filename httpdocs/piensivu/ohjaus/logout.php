<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/logout.php-->
<?
	setcookie("pwd", "", time()-3600);
	header( 'Location: http://www.parontalli.fi/ohjaus/' );
?>