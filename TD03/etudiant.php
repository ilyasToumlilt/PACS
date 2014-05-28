<?php

include("../LI355-TME02/entete.php");
include("ShowForm.php");

echo entete("formulaire etudiant");
echo "<body>";

if ( isset($_POST['mail']) && isset($_POST['id']) && !empty($_POST['mail']) && !empty($_POST['id']) ){
   echo arrayEnTableHTML(array("mail" => $_POST['mail'], 'id' => $_POST['id']), "formulaire etudiant");
} else {
   echo "<form method='post' action='' ><fieldset>";
   echo "<label for='mail_etu'>Mail : </label>";
   echo "<input type='text' id='mail_etu' name='mail' />";
   echo "<label for='id_etu'>Id : </label>";
   echo "<input type='text' id='id_etu' name='id' />";
   echo "<input type='submit' value='Envoyer' />";
   echo "</fieldset></form>";
}

echo "</body>";
echo "</html>";
