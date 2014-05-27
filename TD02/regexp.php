<?php

// Question 1 :
define("RE_MAIL","/^([A-Z][a-z]+(-[A-Z][a-z]+)?)[.]([A-Z][a-z]+(-[A-Z][a-z]+)?)[@]etu[.]upmc[.]fr$/");

// Question 2 :
function titulaire_mail ( $mail ){
   if (preg_match(RE_MAIL, $mail, $matches)){
      return $matches[1] . " " . $matches[3];
   }
   return false;
}