<?php

include ("../LI355-TME02/entete.php");

$ens = array(
    'LI326', 'LI348', 'LI362',
    'LI314', 'LI328', 'LI350', 'LI355',
    'LI316', 'LI334', 'LI351',
    'LI320', 'LI335', 'LI353',
    'LI322', 'LI336', 'LI354',
    'LI323', 'LI339', 'LI369',
    'LI324', 'LI344', 'LI356',
    'LI325', 'LI345', 'LI357'
);

function arrayEnListeHTML($tableauPHP) {
   $resultat = "";
   foreach ($tableauPHP as $k => $v) {
      $resultat .= "<li>$k</li>";
   }
   return $resultat ? "<ul>$resultat</ul>" : '';
}

echo entete("Enseignements");
echo "<body>";
if (empty($_POST['ens'])) {
   echo "<form action='' method='post'><fieldset>\n",
   "<label for='ens'>Enseignements :</label><ul>";
   foreach ($ens as $nom)
      echo "<li><input id='ens-$nom' name='ens[$nom]' type='checkbox' /> $nom</li>\n";
   echo "</ul><input type='submit' value='Envoyer'>\n</fieldset></form>\n";
} else {
   echo arrayEnListeHTML($_POST['ens']);
}
echo "</body></html>";
