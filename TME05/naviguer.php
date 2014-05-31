<?php

function naviguer($articles, $numPage, $mult = 1, $photo = '') {
   $numPage = ( $numPage <= count($articles) AND $numPage > 0 ) ? $numPage : 1;
   if ($numPage > 1)
      $prec = "<input style='float: left;' type='submit' name='page' value='" . ($numPage - 1) . "' />";
   else
      $prec = '';
   if ($numPage < count($articles))
      $suiv = "<input style='float: right;' type='submit' name='page' value='" . ($numPage + 1) . "' />";
   else
      $suiv = '';
   foreach ($articles as $ville => $prix) {
      if (!--$numPage) {
	 $actuel = "<input type='submit' name='page' value='$ville' /> " . $mult * $prix . " Euros";
      }
   }
   return "<form style='width: 15%;' method='post' action='' >" .
	   $photo .
	   "<fieldset>" . $prec . $suiv . "</fieldset>" .
	   "<fieldset>" . $actuel . "</fieldset>" .
	   "</form>";
}

/* TEST */
/*
$bd = array('Londres' => 100, 'Madrid' => 200, 'Berlin' => 300);
require_once('../LI355-TME02/entete.php');
$n = isset($_POST['page']) ? $_POST['page'] : 1;
$titre = "Page $n";
echo entete($titre), "<body>\n<h1>", $titre, "</h1>\n";
if (!is_numeric($n))
   echo "<div>Bon voyage pour " . $bd[$n] . "€ </div>";
else
   echo naviguer($bd, $n);
echo "</body</html>\n";
*/