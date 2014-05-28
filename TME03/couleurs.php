<?php

include 'entete.php';

function printCouleur($couleur) {
   $c = (strcmp($couleur, "Rouge") == 0) ? "#ff0000" : ((strcmp($couleur, "Vert") == 0) ? "#00ff00" : ((strcmp($couleur, "Bleu") == 0) ? "#0000ff" : ((strcmp($couleur, "Jaune") == 0) ? "#ffff00" : ((strcmp($couleur, "Noir") == 0) ? "#000000" : "#888888"))));  

   return "<div style='height:10px;width:10px;background-color:$c'>&nbsp;</div>";
}

echo entete("Couleurs de OUUUUF");

echo "<body>\n";

if (isset($_POST["couleurs"])) {
   foreach ($_POST["couleurs"] as $cl) {
      echo printCouleur($cl); // 
   }
}
?> 

<h1>Super couleurs &agrave; selectionner :</h1> 


<form method='post' action=''> 
   <select multiple="multiple" name="couleurs[]" size="4"> 
      <option>Rouge</option> 
      <option selected="selected">Vert</option>
      <option>Bleu</option> 
      <option>Jaune</option> 
      <option disabled="disabled">Noir</option> 
      <option>Gris</option> 
   </select> 
   <input type="submit" name="sub-mite" value="Afficher"/> 
</form> 
</body> 
</html> 