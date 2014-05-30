<?php

include("../LI355-TME2/entete.php");
include("../LI355-TME2/tableau_en_table.php");

define("RE_URL","@^(\w+)://([^:/]+)(:(\d+))?(.*)?$@");


function get_entetes($hostname, $port, $path){
   if ( !($fd =@ fsockopen($hostname, $port)) ){
      return "Erreur : la conenxion a echoue\n";
   }
   fputs($fd, "GET http://$hostname$path HTTP/1.1\nHost: $hostname\n\n");
   $line = fgets($fd, 4096);
   $headers = array( "status" => $line );
   while ( strlen( $line = fgets($fd, 4096) ) > 2){
      preg_match("@^([^:]+): +(.*)$@", $line, $matches);
      $headers[$matches[1]] = $matches[2];
   }
   fclose($fd);
   return $headers;
}

echo entete("get_entetes");
echo "<body>";

if ( !isset($_GET['url']) || !preg_match(RE_URL, $_GET['url'], $matches)){
   echo "<h3>No URL !</h3>";
} else {
   if ( !$matches[4] ){
      $port = ( $matches[1] == "http" ) ? 80 : 448;
   } else {
      $port = $matches[4];
   }
   $headers = get_entetes($matches[2], $port, $matches[5]);
   echo tableau_en_table($headers, "en-tetes :", '', "50%");
}

echo "</body></html>";