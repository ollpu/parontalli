<?php

//GitHub webhook: push

if($_POST[ 'payload' ]) {
	echo("Payload recieved.");
	$pl = json_decode($_POST['payload'], true);
	//echo(print_r($pl));
	if($pl['ref'] == "refs/heads/master") {
		echo("\n<br>Pushed to master branch.");
	}
	if($pl['ref'] == "refs/heads/dev") {
		echo("\n<br>Pushed to dev branch.");
	}
	
}
?>
