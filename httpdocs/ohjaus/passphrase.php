<?php
	session_start();
	$key = md5(trim(file_get_contents(dirname(__FILE__) . "/passphrase.nogit")));
	$pwd = $_SESSION["pwd"];
	$logged = $pwd == $key;
?>
