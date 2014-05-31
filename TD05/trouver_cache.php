<?php

require_once './typer_cache.php';

function trouver_cache($filename) {
   if (is_readable($filename . ".http") && is_readable($filename . typer_cache(file($filename . ".http")))) {
      return file($filename . ".http");
   }
   return array();
}
