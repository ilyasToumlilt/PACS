<?php

function array_to_string($array){
   $str = "";
   foreach ( $array as $value){
      $str .= " $value";
   }
   return substr($str, 1);
}

function array_to_list ($array){
   if ( empty($array) ){
      return "";
   }
   $str =  "";
   foreach ( $array as $value ){
      $str .= "<li>$value\n</li>\n";
   }
   return "<ul>\n$str\n</ul>\n";
}

function array_to_table($array){
   if ( empty($array)){
      return "";
   }
   $str = "";
   foreach ( $array as $key => $value ){
      $str .= "<tr><td>$key</td><td>$value</td></tr>";
   }
   return "<table>" .
	   "<caption>array_to_table</caption>" .
	   "<tr><th>key</th><th>value</th></tr>" .
	   $str .
	   "<tr><th>key</th><th>value</th></tr>" .
	   "</table>";
}