<?php

function TraiteControle($etapes) {
   $f = $etapes[3];
   if (!is_file($f) OR !is_readable($f))
      return array(404, "Inatteignable");
   else
      return array(200, "");
}

?>