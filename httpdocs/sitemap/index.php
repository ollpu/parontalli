<?php
$rel = "../";

include $rel."db.php";

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
