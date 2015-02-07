<!--Kotisivut Riika/Hevoset, draft 1; /ohjaus/logout.php-->
<?
	session_start();
	session_unset();
	session_destroy();
	header( 'Location: http://www.parontalli.fi/ohjaus/' );
?>
