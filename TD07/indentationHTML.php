<?php

$contenu = array(" " => " ");
$depth = " ";

function ouvrante($parser, $name, $attrs) {
   global $depth, $contenu;
   $t = $contenu[$depth];

   echo preg_replace("%[\n\t ]+$%", "", $t), "\n$depth";

   $contenu[$depth] = "";
   $res = '';
   foreach ($attrs as $k => $v) {
      $res .= "\n " . $depth . $k . "='" . addslashes($v) . "'";
   }
   echo "<" . $name . $res . ">";
   $depth .= '  ';
   $contenu[$depth] = "";
}

function fermante($parser, $name) {
   global $depth, $contenu;
   $t = $contenu[$depth];
   $depth = substr($depth, 2);
   echo preg_replace("%[\n\t ]+$%", "\n$depth", $t);
   echo "</", $name, ">";
}

function texte($parser, $data) {
   // en cas de texte de grande longueur, plusieurs appels de cette fonction se suivront. 
   global $contenu, $depth;
   $contenu[$depth] .= $data;
}

//Tests 
/* function accessibiliser($file) { 
  $xml_parser = xml_parser_create();
  xml_set_element_handler($xml_parser, "ouvrante", "fermante");
  xml_set_character_data_handler($xml_parser, "texte");
  xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, false);
  if (!($f = fopen($file, "r"))) {
  die("Impossible d'ouvrir le fichier '$file'");
  }

  while ($data = fread($f, 1024)) {
  if (!xml_parse($xml_parser, $data, feof($f))) {
  die(sprintf("erreur XML : %s ligne %d",
  xml_error_string(xml_get_error_code($xml_parser)),
  xml_get_current_line_number($xml_parser)));
  }
  }
  xml_parser_free($xml_parser);
  } */
?>