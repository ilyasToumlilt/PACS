<?php

require_once './naviguer.php';
require_once '../LI355-TME02/entete.php';

$bd = array('Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);

$nb = ( isset($_POST['page']) ) ? $_POST['page'] : 1;
$mult = ( isset($_COOKIE['mult']) ) ? $_POST['mult'] : 1;
$title = "Page $nb";

setcookie('mult', $mult+1, time()+60*60*24*7);

echo entete($title);
echo "<body>";
echo "<h1>$title</h1>";
if (is_numeric($nb) ){
   $hidden = "<input type='hidden' name='mult' value='" . ($mult+1) . "' />";
   echo naviguer($bd, $nb, $mult, $hidden);
} else {
   echo "<div>Bon voyage pour " . ($bd[$nb] * ( ($mult > 1 ) ? $mult-1 : 1 )) . " Euros</div>";
}
echo "</body></html>";
