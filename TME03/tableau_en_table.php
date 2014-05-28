<?php

function tableau_en_table($tab, $libelle, $summary = '', $width = "100%") {
   if (!$tab) {
      return '';
   }
   $tableau = '<table width="' . $width . '" summary="' . $summary . '">' . "\n";
   $tableau.='<caption style="background-color:#aaa" >' . $libelle . '</caption>' . "\n";
   $tableau.='<tr style="background-color:#777;"><th> index </th><th> valeur </th></tr>' . "\n";
   $counter = 0; // je met un compteur pour le pair/impair dans le cas des cles non numeriques
   foreach ($tab as $index => $elem) {
      if ($counter % 2 == 0) {
	 $tableau.='<tr style="background-color:#eee;"><td>' . $index . '</td><td>' . $elem . '</td></tr>' . "\n";
      } else {
	 $tableau.='<tr style="background-color:#ddd;"><td>' . $index . '</td><td>' . $elem . '</td></tr>' . "\n";
      }
      $counter++;
   }
   $tableau.='<tr style="background-color:#777;"><th> index </th><th> valeur </th></tr>' . "\n";
   $tableau.='</table>';
   return $tableau;
}

// test avec $_SERVER :
     /*
    include('entete.php');
    echo entete('tableau_en_table');
?>
<body>
    <p>
        <?php
        echo tableau_en_table($_SERVER, "Variable globale SERVER", "test de la fonction tableau en tableau","80%");
        ?>
    </p>
</body>
</html>
      * 
      */