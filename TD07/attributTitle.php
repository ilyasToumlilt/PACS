<?php

global $ferme, $prof;
$prof = 0;
$ferme = array(0 => true); // pour dire rien à faire au premier appel.

function ouvrante($parser, $name, $attrs) {
   global $ferme, $prof;
   static $titles;
   if (!$ferme[$prof]) {
      echo ">";
      $ferme[$prof] = true;
   }
   $prof++;
   echo "<$name";
   foreach ($attrs as $k => $v) {
      echo " $k='", htmlspecialchars($v), "'";
   }
   if ($name == "img" && !isset($attrs['alt'])) {
      $alt = basename($attrs['src']);
      preg_match("/^(\w+)[.]\w+$/", $alt, $matches);
      echo " alt='" . $matches[1] . "'";
   }
   if ($name == 'a') {
      if (!isset($attrs['title'])) {
	 if (isset($titles[$attrs['href']])) {
	    echo " title='" . $titles['href'] . "'";
	 } else {
	    echo " title='Lien" . (count($titles) + 1) . "'";
	    $titles[$attrs['href']] = "Lien" . (count($titles) + 1);
	 }
      } else {
	 $titles[$attrs['href']] = $attrs['title'];
      }
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
