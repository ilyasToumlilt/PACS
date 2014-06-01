<?php

class extraire {

   var $parser;
   var $civilite;
   var $nom;
   var $prenom;
   var $fixe;
   var $mobile;
   var $last_open;
   var $contenu;

   function extraire() {
      $this->parser = xml_parser_create();
      xml_set_object($this->parser, $this);
      xml_set_element_handler($this->parser, "ouverture", "fermeture");
      xml_set_character_data_handler($this->parser, "texte");
      xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
   }

   function parse($data) {
      xml_parse($this->parser, $data) or die(sprintf("Erreur XML : %s a la ligne %d\n", xml_error_string(xml_get_error_code($this->parser)), xml_get_current_line_number($this->parser)));
   }

   function ouverture($parser, $name, $attrs) {
      $this->last_open = $name;
      switch ($name) {
	 case "personne" :
	    $this->civilite = ( $attrs['sexe'] == 'M' ) ? 'M' : 'Mme';
	    break;
	 case "telephone" :
	    $this->fixe = $attrs['fixe'];
	    $this->mobile = $attrs['mobile'];
	    break;
	 default : break;
      }
   }

   function fermeture($parser, $name) {
      switch ($name) {
	 case "elemcarnet" :
	    echo "$this->civilite $this->nom $this->prenom, fixe : $this->fixe, mobile : $this->mobile<br/>";
	    break;
	 case "nom" :
	    $this->nom = $this->contenu;
	    $this->contenu = "";
	    break;
	 case "prenom" :
	    $this->prenom = $this->contenu;
	    $this->contenu = "";
	    break;
	 default : break;
      }
   }

   function texte($parser, $data) {
      switch ($this->last_open) {
	 case "nom" :
	    $this->contenu .= $data;
	    break;
	 case "prenom" :
	    $this->contenu .= $data;
	    break;
	 default : break;
      }
   }

}

$fp = fopen("annuaire.xml",'r') or die ("Fichier introuvable; analyse suspendue");
$parser = new extraire();
while ($data = fread($fp,256)){
        $parser->parse($data);
}
