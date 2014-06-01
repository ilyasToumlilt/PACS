<?php

/* Ce script ne verifie que si le fichier est bien formé ( a noter difference entre formé et valide )
 * et donc ne contient pas de preneurs d'evenements SAX
 * voir donc la question suivante sequence_preneurs.php pour la gestion des evenements SAX.
 */

require_once '../LI355-TME02/entete.php';

function lancer_phraseur($xmlFileName){
   $parser = xml_parser_create();
   xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
   
   if ( !($fp = fopen($xmlFileName, "r")) ) die ("ERROR : fopen()");
   while ( $data = fread($fp, 4096) ){
      if ( !xml_parse($parser, $data, feof($fp)) )
	      break;
   }
   $etat = feof($fp);
   fclose($fp);
   return array($parser, $etat);
}

function get_xml_error_as_string($parser){
   return "erreur XML : ". xml_error_string (xml_get_error_code ($parser)) . "a la ligne " . xml_get_current_line_number ($parser);
}

// Script de verification de formalité :
echo entete("xml_bien_forme");
echo "<body>";
list($parser, $etat) = lancer_phraseur("./annuaire.xml");
if ( $etat ){
   echo "Document bien form&eacute;";
} else {
   echo get_xml_error_as_string($parser);
}
xml_parser_free($parser);
echo "</body></html>";