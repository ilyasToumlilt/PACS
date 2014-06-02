<?php

function ouvrante($parser, $name, $attrs) {
   global $depth, $ferme, $tables;
   static $titles = array();
   static $tables = array();
   static $labels = array();

   if (!$ferme[$depth]) {
      echo '>';
      $ferme[$depth] = true;
   }
   // La ligne suivante concerne la Question 4 + declaration global 
   if (($name == 'td') AND !isset($tables[$depth]))
      $name = 'th';
   $depth++;
   if (($name == 'img') AND !isset($attrs['alt'])) {
      $attrs['alt'] = basename($attrs['src']);
   }
   if (($name == 'a') AND isset($attrs['href'])) {
      $precedent = isset($titles[$attrs['href']]) ? $titles[$attrs['href']] : '';
      if (!isset($attrs['title']) OR ($precedent AND $precedent != $attrs['title'])) {
	 if (!$precedent)
	    $precedent = 'Lien ' . (count($titles) + 1);
	 $attrs['title'] = $precedent;
      }
      $titles[$attrs['href']] = $precedent;
      // Question 5 
      // si pas de ID prendre name, bien que ca ne marche pas si repetition 
   } elseif (($name == 'input') AND isset($attrs['name'])) {
      $id = (isset($attrs['id'])) ? $attrs['id'] : $attrs['name'];
      $attrs['id'] = $id;

      if (!isset($labels[$id]) AND isset($attrs['value'])) {
	 echo "<label for='$id'>", $attrs['value'], "</label>";
      }
   } elseif ($name == 'label')
      $labels[$attrs['for']] = true;

   echo "<$name";
   foreach ($attrs as $k => $v)
      echo " $k='$v'";
   $ferme[$depth] = false;
}

?>