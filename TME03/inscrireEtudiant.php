<?php
include 'entete.php';
include 'tableau_en_table.php';

entete('inscrireEtudiant');

echo "<body>\n";

// VERSION 1 :
echo "<h3>Query_String :</h3>\n";
echo $_SERVER['QUERY_STRING'];

echo "<h3>GET :</h3>\n";
echo tableau_en_table($_GET, '', '', '50%');
echo "<br/><br/><br/>";

// VERSION 2 :

function getForm($nbTD) {
   echo "<form method='get' action='inscrireEtudiant.php' >\n";
   echo "<fieldset>\n";
   echo "<label for='numEtu' >Num&eacute;ro etudiant :</label>\n";
   echo "<input id='numEtu' name='numEtu' type='text' /><br/>\n";
   echo "<label for='TD' >Groupe de TD :</label>\n";
   echo "<select id='TD' name='TD'>\n";
   echo "<option value='TD?'>TD?</option>";
   for ($i = 1; $i <= $nbTD; $i++) {
      echo "<option value='TD$i'>TD$i</option>\n";
   }
   echo "</select><br/>\n";
   echo "<input type='submit' name='send' value='envoyer' />\n";
   echo "</fieldset>\n";
   echo "</form>\n";
}

// premier envoi du formulaire :
if (!isset($_GET['send'])) {
   echo "<p>Premier envoi du formulaire :</p>";
   getForm(10);
} else {
   if ( !empty($_GET['numEtu']) && ( $_GET['TD'] <> "TD?")){
      echo "Etudiant " . $_GET['numEtu'] . " inscris.\n";
   } else {
      if ( empty($_GET['numEtu']) ){
	 echo "Vous avez omis de rentrer le num&eacute;ro d'&eacute;tudiant.<br/>\n";
      }
      if ( $_GET['TD'] == "TD?" ){
	 echo "Vous avez omis de rentrer le groupe de TD.<br/>\n";
      }
      getForm(10);
   }
}
?>
</body>
</html>
