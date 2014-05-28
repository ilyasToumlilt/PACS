<?php

include("../LI355-TME02/entete.php");

function noteValide($note) {
   return preg_match("/^(([0-1]?[0-9])|20)(\.(25|50|5|75))?$/", $note);
}

function moyenne($notes) {
   $nombreNoteValides = 0;
   $somme = 0;

   for ($i = 0; $i < count($notes); $i++) {
      if (noteValide($notes[$i])) {
	 $nombreNoteValides++;
	 $somme = $somme + $notes[$i];
      }
   }
   return $somme / $nombreNoteValides;
}

function notesNonValidesEnListe($etudiants, $notes) {
   $liste = "";

   for ($i = 0; $i < count($notes); $i++) {
      if (!noteValide($notes[$i])) {
	 $liste .= "<li>Etudiant " . $etudiants[$i] . " : note invalide.</li>";
      }
   }
   return $liste ? "<ul>$liste</ul>" : '';
}

function genererTableHTML($etudiants, $notes) {

   if (count($etudiants) != count($notes)) {
      return "<p>Erreur : le nombre de notes est différent du nombre des étudiants.</p>";
   } else {
      $table = "";
      for ($i = 0; $i < count($etudiants); $i++) {
	 $c = ($i % 2 ? 777 : 999);
	 $e = $etudiants[$i];
	 $n = $notes[$i];
	 $table .= "<tr style='background-color:#$c'><td>$e</td><td>$n</td></tr>";
      }
      if (!$table)
	 return '';
      return "<table summary=\"Notes étudiants\">\n"
	      . "<caption>Notes étudiants</caption>\n"
	      . " <tr><th>Nom</th><th>Note</th></tr>\n"
	      . $table
	      . "</table>";
   }
}

echo entete("Les notes et la moyenne obtenue");
echo "<body>\n";
if (isset($_POST["etu"])) {
   echo genererTableHTML($_POST["etu"], $_POST["note"]);
   echo "<div>Moyenne obtenue : ", moyenne($_POST["note"]), "</div>";
   echo notesNonValidesEnListe($_POST["etu"], $_POST["note"]);
} else
   "<div>Aucune note</div>"; 
