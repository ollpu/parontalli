<?php
$yht = mysqli_connect("mysql.3owl.com","u310277879_ojala","Paalihevoset01","u310277879_ojala");
if (mysqli_connect_errno()) {
	echo "Virhe tapahtui yhdistett&auml;ess&auml; tietokantaan: " . mysqli_connect_error() . "<br>Ota yhteys järjestelmänvalvojaan.";
	end();
}

header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');
echo '<?xml version="1.0" encoding="utf-8"?>';

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$haku = mysqli_query($yht, "SELECT * FROM sivut ORDER BY id");
	while ($row = mysqli_fetch_array($haku)){
		echo '
		<url>
			<loc>http://parontalli.fi/?s='. $row['uid'] .'</loc>
		</url>
		
		';
	}

echo '</urlset>';

	
?>
