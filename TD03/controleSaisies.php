<?php
include("../LI355-TME02/entete.php");
include("ShowForm.php");

function validerNuEtudiant($nuEtu){
   if (preg_match("@^[1-9]\d{6}$@", $nuEtu))
      return true;
   return false;
}

function validerMail($mail){
   if (preg_match("/[a-z\'-]+@etu\.upmc\.fr/i", $mail) ){
      return true;
   }
   return false;
}

echo entete("formulaire etudiant");
echo "<body>";

function get_form($mailEtu, $idEtu){
   $mailEtu = htmlspecialchars($mailEtu);
   $idEtu = htmlspecialchars($idEtu);
   return "<form method='post' action='' ><fieldset>" .
	   "<label for='mail_etu'>Mail : </label>" .
	   "<input type='text' id='mail_etu' name='mail' value='$mailEtu' />" .
	   "<label for='id_etu'>Id : </label>" .
	   "<input type='text' id='id_etu' name='id' value='$idEtu' />" .
	   "<input type='submit' value='Envoyer' />" .
	   "</fieldset></form>";
}

if ( isset($_POST['mail']) && isset($_POST['id']) ){
   $valMail = ( validerMail($_POST['mail']) ) ? $_POST['mail'] : '';
   $valId = ( validerNuEtudiant($_POST['id']) ) ? $_POST['id'] : '';
   if ( $valId && $valMail )
      echo arrayEnTableHTML(array("mail" => $_POST['mail'], 'id' => $_POST['id']), "formulaire etudiant");
   else
      echo get_form ($valMail, $valId);
} else {
   echo get_form('', '');
}

echo "</body>";
echo "</html>";