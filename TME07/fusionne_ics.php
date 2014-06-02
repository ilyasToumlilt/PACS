<?php

function fusionneics($file1, $file2) {
   $arr1 = file($file1);
   $arr2 = file($file2);
   do {
      $extracted = array_pop($arr1);
   } while (!preg_match("/END:VCALENDAR/", $extracted));
   while (!preg_match("/BEGIN:[^(VCALENDAR)]/", $arr2[0])) {
      array_shift($arr2);
   }
   return array_merge($arr1, $arr2);
}
