<?php

function array_to_short_string($array, $t=80){
   $str = "";
   foreach ( $array as $value){
      if (strlen($str) + strlen($value) > $t){
	 break;
      }
      $str .= " $value";
   }
   return substr($str, 1);
}

function mult_vect($array, $arg){
   if ( is_numeric($arg) ){
      $new = array();
      foreach ( $array as $value ){
	 $new[] = $value * $arg;
      }
      return $new;
   }
   if (is_array($arg) && count($array) == count($arg)){
      $ps=0;
      for ( $i=0; $i<count($array); $i++){
	 $ps += $array[$i] * $arg[$i];
      }
      return $ps;
   }
   return array();
}