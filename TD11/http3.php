<?php

// Ecriture en deux fonctions pour faciliter le cas Virtual Host lors du TME 

function TraitePerso($etapes) {
   return TraitePersoRoot($etapes, $_SERVER['DOCUMENT_ROOT']);
}

function TraitePersoRoot($etapes, $path) {
   $user = $etapes[2];
   $noms = preg_split(',/+,', $etapes[1][0]);
   array_shift($noms); // saute le "" initial 
   foreach ($noms as $nom) {
      $file = $path . "/.htaccess";
      if (file_exists($file)) {
	 if (!is_readable($file) OR (fileperms($file) & 2)) {
	    return array(500, "Probleme d’acces sur $file");
	 } else {
	    $lignes = file($file);
	    if (in_array("require valid-user\n", $lignes) AND !$user) {
	       return array(401, "Demande d'authentification");
	    }
	 }
      }
      $path .= '/' . $nom;
   }
   return array(200, $path);
}
