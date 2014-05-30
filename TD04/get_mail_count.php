<?php

include('./connexion.php');

function get_mail_count($sock){
  $res = commande($sock, "STAT");
  if ($res) {
    $res = preg_plit('/\s+/', $res);
    array_shift($res); // shifter le OK 
  }
  return $res;
}
