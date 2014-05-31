<?php

function charger_cache($nom) {
   $clefVal = array();
   foreach (is_readable($nom) ? file($nom) : array() as $v) {
      list($nom, $age) = preg_split('@\s+@', $v);
      $clefVal[$nom] = intval($age);
   }
   return $clefVal;
}

function actualiser_cache($nom) {
   $tabCaches = charger_cache(CACHEFILE);
   if ($d = fopen(CACHEFILE, 'w')) {
      $tabCaches[$nom] = time();
      if (count($tabCaches) > MAXCACHES)
	 $tabCaches = nettoie_cache($tabCaches);
      foreach ($tabCaches as $k => $heure)
	 fputs($d, $k . " " . $heure . "\n");
      fclose($d);
   }
}
