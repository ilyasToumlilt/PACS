<?php

// Question 1 :
define("RE_HORAIRE", "/([01][0-9]|2[0-3]):([0-5][0-9])/");

// Question 2 :
function horaires($chaine){
   if (preg_match_all(RE_HORAIRE, $chaine, $matches) == 2 ){
      return $matches[0][0] . "-" . $matches[0][1];
   }
   return "";
}