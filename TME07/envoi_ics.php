<?php

function envoi_ics($ics_array, $filename) {
   header("Content-Type: text/calendar; charset=UTF-8");
   header("Content-Transfert-Encoding: 8bit");
   header('Content-Disposition: inline; filename="' .
	   $filename .
	   '"; creation-date="' .
	   gmdate("D, d M Y H:i:s", time()));
   foreach ($ics_array as $line) {
      echo $line;
   }
}
