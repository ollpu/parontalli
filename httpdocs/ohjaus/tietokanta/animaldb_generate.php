<?php

include "../../skeleton/header.php";

//Requires /httpdocs/skeleton/header
//         (Database connection as $yht)

function escape($input, $con){
	return mysqli_real_escape_string($con, $input);
}

//Use this when animal database entries are changed
//This function expects that raw text and html haven't changed
function regenerate_all_pages() {
  
  $query = mysqli_query($yht, "SELECT uid, predit_teksti, predit_html FROM sivut");
  while($row = mysqli_fetch_assoc($query)) {
    generate_and_save_page($yht, $row['uid'], $row['predit_teksti'], $row['predit_html']);
  }
}


function generate_and_save_page($yht, $uid, $rawtext, $rawhtml) {
  $new_values = generate_page($yht, $rawtext, $rawhtml);
  echo("Newtext='".$new_values['text']."'"."Raw='$rawtext'");
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
?>
