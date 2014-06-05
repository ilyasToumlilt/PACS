<?php

header("text/plain");
$n = isset($_GET['n']) ? $_GET['n'] : 0;
if (!$n OR !is_array($n)) {
   echo 0;
} else {
   $dir = fopen('/tmp/notes_td10.log', 'w');
   fwrite($dir, var_export($n, true));
   fclose($dir);
   echo array_sum($n) / count($n);
}