<?php

function tableau_en_table($array, $libelle, $summary='', $width='100%'){
   $str = '';
   $i = 0;
   foreach ( $array as $key => $value ){
      $style = ( $i % 2 ) ? 'eee' : 'ddd';
      $str .= "<tr style='background-color: #$style;'><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>\n";
      $i++;
   }
   if ( $str == '' ){
      return '';
   }
   $libelle = htmlspecialchars($libelle);
   $summary = htmlspecialchars($summary);
   $width = htmlspecialchars($width);
   return "<table summary='$summary' style='width: $width;'>\n" .
	   "<caption style='background-color: #aaa;'>$libelle</caption>\n" .
	   "<tr style='background-color: #777;'><th>Index</th><th>Valeur</th></tr>\n" .
	   $str .
	   "</table>";
}


/* TEST : */
/*
include ('./entete.php');
echo entete('test : tableau en table');
echo "<body>";
echo tableau_en_table($_SERVER, "SERVER", '', '50%');
echo "</body>";
echo "</html>";
*/
