<?php

// Ignorer le nom du serveur et son protocole en cas d'URL absolue
// Separer la Query-string du reste.
function TraiteUrl($etapes) {
   preg_match('@^(\w+://[^/]*)?([^?]*)[?]?(.*)$@', $etapes[0], $a);
   array_shift($a); // retirer la copie de la chaine
   array_shift($a); // retirer le serveur
   return array(200, $a);
}

function TraiteAuth($etapes) {
   return array(200, @$_SERVER['PHP_AUTH_USER']);
}

?>