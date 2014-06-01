<?php

function ouvrante($parser, $name, $attrs){
   echo "overture de : $name<br/>";
}

function fermante($parser, $name){
   echo "fermeture de : $name<br/>";
}

function textElement($parser, $data){
   if ( trim($data))
      echo "Text recu : $data<br/>";
   else
      echo "Saut de ligne<br/>";
}

function lancer_phraseur($xmlFileName){
   $parser = xml_parser_create();
   xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
   xml_set_character_data_handler($parser, "textElement");
   xml_set_element_handler($parser, "ouvrante", "fermante");
   
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

require_once '../LI355-TME02/entete.php';

// Script de verification de validité :
echo entete("sequence_preneurs");
echo "<body>";
list($parser, $etat) = lancer_phraseur("./annuaire.xml");
if ( !$etat ){
   echo get_xml_error_as_string($parser);
}
xml_parser_free($parser);
echo "</body></html>";