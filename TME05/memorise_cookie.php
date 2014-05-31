<?php

require_once '../LI355-TME02/entete.php';
require_once './naviguer.php';

function memorise_cookie() {
   if (!isset($_COOKIE['visite'])) {
      $v = 1;
      $f = 'COOKIE/' . md5(mt_rand() . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
   } else {
      $f = $_COOKIE['visite'];
      $v = array_shift(file($f));
   }
   if ($d = fopen($f, 'w')) {
      fputs($d, $v + 1);
      fclose($d);
   }
   setcookie('visite', $f);
   return $v;
}

$bd = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);

$nb = ( isset($_POST['page']) ) ? $_POST['page'] : 1;
$mult = memorise_cookie();
$title = "Page $nb";

echo entete($title);
echo "<body>";
echo "<h1>$title</h1>";
if (is_numeric($nb) ){
   echo naviguer($bd, $nb, $mult, $hidden);
} else {
   echo "<div>Bon voyage pour " . ($bd[$nb] * ( ($mult > 1 ) ? $mult-1 : 1 )) . " Euros</div>";
}
echo "</body></html>";