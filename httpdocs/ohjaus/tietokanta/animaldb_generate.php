<?php

//Requires /httpdocs/skeleton/header
//         (Database connection as $yht)

function generate_page($rawtext, $rawhtml) {
  //Replace all occurances of "<!--animalname&price?-->" (Animal database system)
  $rightNav = "";
  while($check != ($rawtext = preg_replace_callback(
        "/\\<!-+([a-zA-Z0-9_]+&[a-zA-Z0-9_]+)-+\\>/",
        function ($matches) {
          $matches = explode('&', $matches[1]);
          $rightNav .= "<a href='#". $matches[0] ."'>".get_short_animalname(...)."</a><br>";
          
          return returnAnimalById($yht, $matches[0], $matches[1] == "true");
        },
        $stri
      ))) {
    $check = $stri;
  }
  
  return { "text" -> $rawtext, "html" -> $rawhtml };
}


function get_short_animalname($yht, $animalid) {
  
}
?>
