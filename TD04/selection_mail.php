<?php

require_once './connexion.php';
require_once './get_mail_count.php';
require_once './recuperation_entetes.php';
require_once './recuperation_message.php';
require_once './selection_message.php';

function affiche_mail($num, $entetes, $message) {
   $res = "<table summary='Mail num. $num'>\n";
   $res .= "<caption>" . $entetes["From"] . "</caption>";
   $res .= "<tr><th>Entêtes</th><th>Valeurs</th></tr>";

   foreach ($entetes as $k => $v)
      $res .= "<tr><td>$k</td><td>$v</td></tr>\n";
   $res .= "<tr><td colspan='2'>$message</td></tr>\n";
   $res .= "</table>\n";
   return $res;
}

function selection_mail($sock, $criteres) {
   $res = '';
   $n = get_mail_count($sock);
   if ($n)
      $n = $n[0];
   for (; $n; $n--) {
      $entetes = recuperation_entetes($sock, $n);
      $res = selection_mail($entetes, $criteres);
      if ($res) {
	 $message = recuperation_message($sock, $n);
	 $res .= affiche_mail($n, $entetes, $message);
      }
   }
   return "<html><head><title>Mails filtrés</title></head><body>$res</body></html>";
}
