<?php

// declaration des variables globales :
$civilite = "";
$nom = "";
$prenom = "";
$fixe = "";
$mobile = "";
$last_open = "";
$contenu = "";

function ouvrante($parser, $name, $attrs){
   global $civilite;
   global $fixe;
   global $mobile;
   global $last_open;
   $last_open = $name;
   switch ( $name ){
      case "personne" :
	 $civilite = ( $attrs['sexe'] == 'M' ) ? 'M' : 'Mme';
	 break;
      case "telephone" :
	 $fixe = $attrs['fixe'];
	 $mobile = $attrs['mobile'];
	 break;
      default : break;
   }
}

function fermante($parser, $name){
   global $civilite;
   global $nom;
   global $prenom;
   global $fixe;
   global $mobile;
   global $contenu;
   switch ( $name ){
      case "elemcarnet" :
	 echo "$civilite $nom $prenom, fixe : $fixe, mobile : $mobile<br/>";
	 break;
      case "nom" :
	 $nom = $contenu;
	 $contenu = "";
	 break;
      case "prenom" :
	 $prenom = $contenu;
	 $contenu = "";
	 break;
      default : break;
   }
}

function textElement($parser, $data){
   global $last_open;
   global $contenu;
   switch ( $last_open ){
      case "nom" :
	 $contenu .= $data;
	 break;
      case "prenom" :
	 $contenu .= $data;
	 break;
      default : break;
   }
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
echo entete("affichage_annuaire");
echo "<body>";
list($parser, $etat) = lancer_phraseur("./annuaire.xml");
if ( !$etat ){
   echo get_xml_error_as_string($parser);
}
xml_parser_free($parser);
echo "</body></html>";