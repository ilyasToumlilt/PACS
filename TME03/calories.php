<?php
include 'entete.php';
include 'tableau_en_table.php';

entete(calories);
echo "<body>\n";

$calories = array("banane" => 130, "pomme" => 300, "litchie" => 30);

echo "<h3>1. Affichage par ordre alphab&eacute;tique des calories :</h3>\n";
asort($calories);
echo tableau_en_table($calories, 'tableau calorique', '', "40%");
echo "<br/>";

echo "<h3>2. Affichage par ordre alphab&eacute;tique des noms des fruits :</h3>\n";
ksort($calories);
echo tableau_en_table($calories, 'tableau calorique', '', "40%");
echo "<br/>";
?> 

</body>
</html>