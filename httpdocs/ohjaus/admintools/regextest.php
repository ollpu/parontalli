

<?php

$stri = "<!--hevonen_1&true--> <!--saddsf&false-->";
while($check != ($stri = preg_replace_callback(
      "/\\<!-+([a-zA-Z0-9_]+&[a-zA-Z0-9_]+)-+\\>/",
      function ($matches) {
        $matches = explode('&', $matches[1]);
        return('name:'.$matches[0].':dispprice:'.$matches[1]);
      },
      $stri
    ))) {
  $check = $stri;
}

echo($stri);
?>
