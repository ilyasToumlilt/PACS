<?php

function detoure_image($png_file, $align, $marge = 0) {
   $f = imagecreatefrompng($png_file);
   $str='';
   $tab = getimagesize($f);
   $largeur = $tab[0];
   $hauteur = $tab[1];

   for ($i = 0; $i < $hauteur; $i++) {
      $cpt = 0;
      if ($align == "left") {
	 for ($j = 0; $j < $largeur; $j++) {
	    $c = imagecolorat($f, $j, $i);
	    if ((($c >> 24 ) & 0x7F) < 125) {
	       $array[] = $largeur + $marge - $cpt;
	       break;
	    }
	    $cpt++;
	 }
      } else {
	 for ($j = $largeur; $j > 0; $j--) {
	    $c = imagecolorat($f, $j, $i);
	    if ((($c >> 24 ) & 0x7F) < 125) {
	       $array[] = $largeur + $marge - $cpt;
	       break;
	    }
	    $cpt++;
	 }
      }
   }
   
   foreach ( $array as $val ){
    $str.=
  "<div style='float:$align;clear:$align;height:1px;width:$val;'></div><br/>\n";
   }
   
   
   return $str;
   
   
}


function detoure($txt,$png_file, $align, $marge = 0){
   
   $f = imagecreatefrompng($png_file);
   $str='';
   $tab = getimagesize($f);
   $largeur = $tab[0];
   $hauteur = $tab[1];
   
   $str="<div style='border:1px black solid; width=150%;'>";
   $str.="<div style='position:relative;float:$align;'>";
   $str.="<span style='background:url($png_file);position:absolute;$align:0px;width:".$largeur."px;height:".$hauteur."px;'>";
   $str.=detoure_image($png_file, $align);
   $str.="</span></div></div>";
   $str.="<p>".$txt."</p>";
   
   return $str;
   
   
}

?>
