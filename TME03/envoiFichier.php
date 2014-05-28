<?php

move_uploaded_file($_FILES["fichier"]["tmp_name"], "./TD?/" . $_FILES["fichier"]["name"]);
$contenuFichier = file_get_contents($_FILES["fichier"]["tmp_name"]);
if ($contenuFichier) {
   mail("mr.ilyas@live.fr", "UnMessageQuiNePasseraJamais", $contenuFichier);
}
