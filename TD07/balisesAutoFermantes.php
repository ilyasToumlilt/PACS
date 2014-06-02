<?php

global $ferme, $prof;
$prof = 0;
$ferme = array(0 => true); // pour dire rien à faire au premier appel.

function ouvrante($parser, $name, $attrs) {
   global $ferme, $prof;
   if (!$ferme[$prof]) {
      echo ">";
      $ferme[$prof] = true;
   }
   $prof++;
   echo "<$name";
   foreach ($attrs as $k => $v) {
      echo " $k='", htmlspecialchars($v), "'";
   }
   $ferme[$prof] = false;
}

function fermante($parser, $name) {
   global $ferme, $prof;
   if (!$ferme[$prof]) {
      echo "/>";
   } else {
      echo "</$name>";
   }
   $prof--;
}

function texte($parser, $data) {
   global $ferme, $prof;
   if (!$ferme[$prof]) {
      echo ">";
      $ferme[$prof] = true;
   }
   echo htmlspecialchars($data);
}
