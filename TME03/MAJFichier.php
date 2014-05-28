<?php

function tabFromFich($file_name) {
   $array = array();
   $F = fopen ( $file_name, "r");
   while ( !feof($F) ) {
      $line = fgets($F);
      if ( preg_match('/(.*) (.*)/', $line, $matches)) {
	 $array[$matches[1]]=$matches[2];
      }
   }
   fclose($F);
   return $array;
}

function TDdeEtudiant ($file_name, $numEtu){
   $F = fopen($file_name, "r");
   while ( !feof($F)) {
      $line = fgets($F);
      if (preg_match("/$numEtu (.*)/", $line, $matches)) {
	 fclose($F);
	 return intval($matches[1]);
      }
   }
   fclose($F);
   return 0;
}

function ajoutEnFinFile( $file_name, $numEtu, $numTD ){
   $F = fopen($file_name, "a");
   fwrite($F, "$numEtu $numTD\n");
   fclose($F);
}

include 'entete.php';
include 'tableau_en_table.php';

entete('MAJFichier');
echo "<body>";

// auto-generation of 30 couples :
for ( $i=0; $i<30; $i++){
   ajoutEnFinFile("etudiant_note.txt", rand(1000000,9999999), rand(1,10));
}

echo tableau_en_table(tabFromFich("etudiant_note.txt"), '', '', '50%');

echo "</body></html>";

/* ATTETION : Voir inscrireEtudiant2 pour la deuxieme version du script
 * Ce n'est pas demandé dans la consigne 
 * mais le prof l'a demandé en TME
 * CHECK dqsfdf cdc hachem est un con il nous reste que 35min laisse moi finir
 */

