<?php

define("RE_SECU", "/^[^<>'\"]+$/");

function get_securise($str, $arr, $default = "") {
   if (isset($arr[$str]) && preg_match(RE_SECU, $arr[$str]))
      return $arr[$str];
   return $default;
}
