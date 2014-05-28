<?php

include ("../LI355-TME02/tableau_en_table.php");

function arrayEnTableHTML($array, $summary){
   $r = array();
   foreach ( $array as $key => $value ) {
      $r[htmlspecialchars ($key)] = htmlspecialchars ($value);
   }
   return tableau_en_table($array, $summary, $summary, "50%");
}

function queryString(){
   return "<p>" . htmlspecialchars($_SERVER['QUERY_STRING']) . "</p>";
}