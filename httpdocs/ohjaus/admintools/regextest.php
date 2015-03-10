

<?php

$stri = "<!--hevonen_1--> <!--saddsf-->";
while($check != ($stri = preg_replace_callback(
      "/\\<!-+([a-zA-Z0-9_]+)-+\\>/",
      function ($matches) {
        return("dsdsdsd:".$matches[1]);
      },
      $stri
    ))) {
  $check = $stri;
}

echo($stri);
?>
