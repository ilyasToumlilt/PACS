<?php

define('RE_HTTP200', "%^HTTP.*200 OK%");
define('RE_NOCACHE', "%^(Pragma|Cache-Control):.*no-cache%");

function no_cache($serveur, $port, $resource) {
   $d = fsockopen($serveur, $port);
   if (!$d)
      echo $serveur, " sur le port ", $port, " est muet.";
   else {
      $entetes = array();
      $cache = true;
      fputs($d, "GET http://$serveur$resource HTTP/1.1\nHost: $serveur\n\n");
      while (strlen($l = fgets($d)) > 2) {
	 if (preg_match(RE_NOCACHE, $l))
	    $cache = false;
	 $entetes[] = $l;
      }
      $page = '';
      while (!feof($d))
	 $page .= fgets($d);
      foreach ($entetes as $l)
	 header($l);
      echo $page;
      return ($cache AND preg_match(RE_HTTP200, $entetes[0])) ? array($entetes, $page) : false;
   }
}
