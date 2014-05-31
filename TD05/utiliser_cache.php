<?php

// Constante indiquant le nombre maximum de cache
define('MAXCACHES', 6);
// Répertoire des caches
define('DIRCACHE', 'Cache/');
// Fichier de la table des caches : md5 => date (en secondes depuis le 1/1/1970)
define('CACHEFILE', 'Cache/caches');
// Analyser une URL
define('RE_URL', "%http://([^/:]*)(:(\d+))?(/.*)$%");

include('actualiser_cache.php');
include('limiter_cache.php');
include('memoriser_cache.php');
include('nettoyer_cache.php');
include('no_cache.php');
include('trouver_cache.php');
include('typer_cache.php');

function utiliser_cache($url) {
   $md5 = md5($url);
   $h = trouver_cache(DIRCACHE . $md5);
   if ($h AND limiter_cache($h)) {
      actualiser_cache($md5);
      foreach ($h as $l)
	 header($l);
      readfile(DIRCACHE . $md5 . "." . typer_cache($h));
   } elseif (!preg_match(RE_URL, $url, $desc)) {
      header('HTTP/1.1 400');
      echo "URL incomprise";
   } else {
      $r = no_cache($desc[1], $desc[3] ? $desc[3] : 80, $desc[4]);
      if ($r AND memoriser_cache(DIRCACHE . $md5, $r[0], $r[1])) {
	 actualiser_cache($md5);
      }
   }
}

// Pour tester (avec utiliser_cache.php?URL sans meme de truc=URL):
utiliser_cache($_SERVER["QUERY_STRING"]);
