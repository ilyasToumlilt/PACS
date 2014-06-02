<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   require_once '../LI355-TME02/entete.php';
   echo entete("fournir_ics");
   echo "<body>";
   echo "<form method='post' action='' enctype='multipart/form-data' ><fieldset>";
   echo "<label for='ics1' >Fichier 1 :</label>";
   echo "<input type='file' id='ics1' name='file1' value='Fichier1' />";
   echo "<label for='ics2' >Fichier 2 :</label>";
   echo "<input type='file' id='ics2' name='file2' value='Fichier2' />";
   echo "<input type='submit' value='Envoyer' />";
   echo "</fieldset></form></body></html>";
} else {
   require_once 'fusionne_ics.php';
   require_once 'envoi_ics.php';
   $fusion = fusionneics($_FILES['file1']['tmp_name'], $_FILES['file2']['tmp_name']);
   envoi_ics($fusion, "calendar");
}
