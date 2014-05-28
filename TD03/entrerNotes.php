<?php

include("../LI355-TME02/entete.php");

define("NBTD", 4);

$listeEtudiantsTDn = array("Dupond", "Dupont", "Castafiore", "Haddock", "Hergé",
    "Milou", "Tintin", "Tournesol");

echo entete("Formulaires numTD puis notes");

echo "<body>\n";

if (empty($_GET['td']) OR ($_GET['td'] > NBTD)) {
   #echo "vous avez peut-être oublié d'envoyer le formulaire"."\n"; 
   #echo "ou vous avez oublié de rentrer le numéro d'un TD"."\n"; 
   #echo "ou le TD ".$_GET['td']." n'existe pas"."\n"; 
   echo '<form action="entrerNotes.php" method="get"><fieldset>';
   echo "<label for='td'>groupe de TD</label>\n";
   echo "<input type='text' size ='2' name='td' id='td'> <br />\n";
   echo '<input type="submit" value="Envoyer"> <br />';
   echo '</fieldset></form>';
} else {
   echo "<form action='notesEntrees.php' method='post'>\n";
   echo '<table>';
   echo "<tr> <th>Nom</th><th>Note</th></tr>\n";
   for ($i = 0; $i < count($listeEtudiantsTDn); $i++) {
      echo "<tr style='background-color:#", ($i % 2 ? 777 : 999) . "'>\n";
      echo "<td><input type='text' size ='10' name='etu[]' value='";
      echo $listeEtudiantsTDn[$i] . "'>";
      echo "</td>\n<td> <input type='text' size ='5' name='note[]'>";
      echo "</td></tr><br />\n";
   }
   echo '</table>';
   echo "<div><input type='submit' value='Envoyer'> </div>\n";
   echo '<form>';
}
echo "</body></html>\n";
