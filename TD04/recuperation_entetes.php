<?php

include('./connexion.php');

define("RE_ENTETE_SMTP", "/^([A-Z][-a-zA-Z]+):(.*)$/");

function recuperation_entetes($sock, $num) {
   $res = commande($sock, "TOP $num 0");
   if (!$res)
      return false;
   $entetes = array();

   $cle = '';

   while (($ligne = trim(fgets($sock))) != '.') {
      //$tmp = preg_replace("/\r\n/", "<br />\n", htmlentities($ligne));
      $tmp = htmlentities($ligne);
      if (preg_match(RE_ENTETE_SMTP, $tmp, $r)) {
	 $cle = $r[1];
	 if (isset($entetes[$cle])) {
	    $entetes[$cle] .= "<br />\n" . $r[2];
	 } else {
	    $entetes[$cle] = $r[2];
	 }
      } else {
	 // Autre ligne : ajout a la derniere cle trouvee
	 $entetes[$cle] .= "<br />\n" . $tmp;
      }
   }

   return $entetes;
}
