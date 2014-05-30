<?php

function selection_message($entetes, $contraintes) {
   foreach ($contraintes as $cle => $val) {
      if (!isset($entetes[$cle]) || ($entetes[$cle] != $val))
	 return false;
   }
   return true;
}
