<?php

function etape($f, &$etapes) {
   list($status, $reponse) = $f($etapes);
   if ($status == 200)
      $etapes[] = $reponse;
   else {
      header("HTTP/1.1 $status");
      echo $reponse;
      TraiteLog($etapes);
      exit;
   }
}
