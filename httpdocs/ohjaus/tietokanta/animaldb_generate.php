<?php



//Requires /httpdocs/skeleton/header
//         (Database connection as $yht)

function escape($input, $con){
	return mysqli_real_escape_string($con, $input);
}

//Use this when animal database entries are changed
//This function expects that raw text and html haven't changed
function regenerate_all_pages($yht) {
  
  $query = mysqli_query($yht, "SELECT uid, predit_teksti, predit_html FROM sivut");
  while($row = mysqli_fetch_assoc($query)) {
    generate_and_save_page($yht, $row['uid'], $row['predit_teksti'], $row['predit_html']);
  }
}


function generate_and_save_page($yht, $uid, $rawtext, $rawhtml) {
  $new_values = generate_page($yht, nl2br($rawtext), $rawhtml);
  mysqli_query($yht, "UPDATE sivut SET
    teksti = '".escape($new_values['text'], $yht)."',
    html = '".escape($new_values['html'], $yht)."'
    WHERE uid = '$uid'");
}

function generate_page($yht, $rawtext, $rawhtml) {
  //Replace all occurances of "<!--animalname&price?-->" (Animal database system)
  $rightNav = "";
  
  $rawtext = preg_replace_callback(
    "/\\<!-+([a-zA-Z0-9_]+&[a-zA-Z0-9_]+)-+\\>/",
    function ($matches) use (&$rightNav, $yht) {
      
      $matches = explode('&', $matches[1]);
      $id = $matches[0];
      $displayprice = $matches[1] == "true";
      
      $rightNav .= "<a href='#animal". $id ."'>".get_short_animalname($yht, $id)."</a><br>";
      
      return returnAnimalById($yht, $id, $displayprice);
    },
    $rawtext
  );
  
  
  
  //$rightNav now contains a preformatted list of links to all animals rendered on this page
  if ($rightNav != "") {
    $rawhtml .= "
    <div class='rnav'>
      <a href='#thispage'>Ylös</a><br>
      $rightNav
    </div>
    <script>
      function rnavPosByHeader()
      {
        var header = document.getElementsByClassName('header');
        var nav = document.getElementsByClassName('nav');
        var rnav = document.getElementsByClassName('rnav');

        var headerheight = header[0].offsetHeight + nav[0].offsetHeight + 40;
        var scrollPos = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollPos > (headerheight - 20)) {scrollPos = headerheight - 20;}
        rnav[0].style.top = headerheight - scrollPos + 'px';
      }
      rnavPosByHeader();
    </script>";
  }
  
  return array( "text" => $rawtext, "html" => $rawhtml );
}


function get_short_animalname($yht, $animalid) {
  $query = mysqli_query($yht, "SELECT short_name FROM `animals` WHERE `id_name` = '$animalid' LIMIT 1");
  return mysqli_fetch_assoc($query)['short_name'];
}


function displayAnimalById($yht, $animalid, $displayprice)
	{ echo( returnAnimalById($yht, $animalid, $displayprice)); }

function returnAnimalById($yht, $animalid, $displayprice) {
	$query = mysqli_query($yht, "SELECT * FROM `animals` WHERE id_name = '$animalid' LIMIT 1");
	$row = mysqli_fetch_assoc($query);
	
	if($row['id_name'] != '') {
		$imagerows = array();
		if(trim($row['img']) != '') {
			$imagerows = explode("\n", trim($row['img']));
			$images = array();
			foreach($imagerows as $key => $imagerow) {
				$images[$key] = explode(',', $imagerow);
			}
		}
		return returnAnimal($animalid, $row['name'], $images, nl2br($row['link']), $row['sukuposti'], nl2br($row['text']), $row['price'], $displayprice);
	//if not found, display a warning message
	} else return ("<br><span class='varoitus'>Varoitus!</span> Pyytämääsi eläintä ('$animalid') ei löytynyt tietokannasta!</br>");
}

function returnAnimal($id, $name, $images, $links, $sukuposti, $text, $price, $displayprice) {
	$toReturn = "";
	//Title
	$toReturn .= ("
	<h2 id='animal$id'>$name</h2><br/>
	");
	//Images, in rows
	if(count($images)) foreach($images as $imagerow) {
		$toReturn .= ("
		<div class='img img".count($imagerow)."'>
		");
		foreach($imagerow as $image) {
			$toReturn .= ("
			<img src='$image'> ");
		}
		$toReturn .= ("
		</div><br/><br/>
		");
	}
	$toReturn .= ("
	");
	if(trim($links) != "") {
		$toReturn .= ("
		$links
		<br/>
		");
	}
	if(trim($sukuposti) != "") {
		$toReturn .= ("<a href='$sukuposti'>Sukuposti</a><br/>
		");
	}
	if(trim($text) != "") {
		$toReturn .= (nl2br($text));
		$toReturn .= ("
		<br/><br/>
		");
	}
	if($displayprice) {
		$toReturn .= (nl2br($price));
	}
	
	return $toReturn;
	
}
?>
