<?php
//req: $logged as PreProc by login script
//req: $rel as relation to root www dir

if(!$logged) {
	exit("Et ole kirjautunut sis&auml&aumln! Yrit&auml uudestaan <a href='". $rel ."ohjaus/'>t&aumlst&auml</a>.");
}
?>
