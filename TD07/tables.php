<?php

global $ferme, $prof, $tables, $tableIndex;
$prof = $tableIndex = 0;
$ferme = array(0 => true); // pour dire rien à faire au premier appel.
$tables = array();

function ouvrante($parser, $name, $attrs) {
   global $ferme, $prof, $tables, $tableIndex;
   static $titles = array();
   if (!$ferme[$prof]) {
      echo ">";
      $ferme[$prof] = true;
   }
   $prof++;

   if ($name == "table") {
      $tables[$tableIndex] = true;
      $tableIndex++;
   }

   if ($name == "td" && $tables[$tableIndex - 1]) {
      $name = "th";
   }

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
   global $ferme, $prof, $tables, $tableIndex;
   if ($name == "td" AND $tables[$tableIndex - 1]) {
      $name = "th";
   }
   if (!$ferme[$prof]) {
      echo "/>";
   } else {
      echo "</$name>";
   }
   if ($name == "table") {
      $tableIndex--;
      unset($tables[$tableIndex]);
   }
   if ($name == "tr") {
      $tables[$tableIndex - 1] = false;
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
