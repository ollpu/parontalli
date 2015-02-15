<?php

//GitHub webhook: push

if($_POST['ref'] == "refs/heads/master") {
	echo("Pushed to master!");
} else if($_POST['ref'] == "refs/heads/dev") {
	echo("Pushed to dev!");
} else echo($_POST['ref']);

?>
