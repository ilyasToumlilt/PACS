<?php

function getSoumissionForm($numEtu='', $mail='', $file=array(false,false)) {
   $numEtu = htmlspecialchars($numEtu);
   $mail = htmlspecialchars($mail);
   $ficSoum = $file[0] ? "checked='checked'" : '';
   $ficMail = $file[1] ? "checked='checked'" : '';
   return "<form method='post' action='' >\n" .
	   "<fieldset>\n" .
	   "<label for='numEtu'>Num&eacute;ro &eacute;tudiant : </label>\n" .
	   "<input id='numEtu' name='numEtu' type='text' value='$numEtu' /><br/>\n" .
	   "<label for='mail'>Adresse Mail : </label>\n" .
	   "<input id='mail' name='mail' type='text' value='$mail' /><br/>\n" .
	   "<label for='ficSoum'>Fichier &agrave; soumettre </label>\n" .
	   "<input type='checkbox' id='ficSoum' name='fic[]' $ficSoum /><br/>\n" .
	   "<label for='ficMail'>Fichier par Mail </label>\n" .
	   "<input type='checkbox' id='ficMail' name='fic[]' $ficMail /><br/>\n" .
	   "<input type='submit' name='send' value='soumettre' />\n" .
	   "</fieldset>\n" .
	   "</form>\n";
}

include 'entete.php';

echo entete('Formulaire Soumission');
echo "<body>\n";

if ( empty($_POST) ) {
   echo getSoumissionForm();
} else {
   if ( trim($_POST['numEtu']) == '' || trim($_POST['mail']) == '' ){
      echo getSoumissionForm($_POST['numEtu'],$_POST['mail']);
   } else {
      echo "soumission ok.";
   }
}

echo "</body></html>";

?>