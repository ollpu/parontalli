<?php
session_start();

if($_GET["text"] != "") {
	$_SESSION["text"] = $_GET["text"];
}

print($_SESSION["text"]);

?>
