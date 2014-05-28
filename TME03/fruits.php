<?php

include 'entete.php';

entete('fruits');
echo "<body>\n";

$fruits = array( "banane", "pomme", "litchie");

asort($fruits);

$i = 0;
echo "<h3>Avec la boucle while :</h3>\n";
echo "<ul>\n";
while ( $i < count($fruits) ) {
   echo "<li>$fruits[$i]</li>\n";
   $i++;
}
echo "</ul>\n";

echo "<h3>Avec la boucle for : </h3>\n";
echo "<ul>\n";
for ( $i=0 ; $i<count($fruits); $i++){
   echo "<li>$fruits[$i]</li>\n";
}
echo "</ul>\n";

echo "<h3>Avec la boucle foreach : <br/></h3>\n";
echo "<ul>\n";
foreach ( $fruits as $value ) {
   echo "<li>$value</li>\n";
}
echo "</ul>\n";

?>
</body></html>