<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" 
   "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xml:lang="fr" lang="fr" xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>LI355-TD02 : 1.Tableaux.php</title>
   </head>
   <body>

   <?php
   $Candidats = array("candidatB", "candidatA", "candidatsC");

   echo "<h2>Avant tri :</h2>\n";
   
   echo "<h3>Boucle for :</h3>\n";
   echo "<ul>\n";
   for ( $i=0; $i<count($Candidats);$i++){
      echo "<li>" . $Candidats[$i] . "</li>\n";
   }
   echo "</ul>\n";
   
   echo "<h3>Boucle while :</h3>\n";
   echo "<ul>\n";
   $i=0;
   while ($i < count($Candidats)){
      echo "<li>" . $Candidats[$i] . "</li>\n";
      $i++;
   }
   echo "</ul>\n";
   
   echo "<h3>Boucle foreach :</h3>\n";
   echo "<ul>\n";
   foreach ( $Candidats as $value ){
      echo "<li>$value</li>\n";
   }
   echo "</ul>\n";
   
   echo "<h2>Apr&eacute;s tri :</h2>\n";
   asort($Candidats);
   
   echo "<h3>Boucle for :</h3>\n";
   echo "<ul>\n";
   for ( $i=0; $i<count($Candidats);$i++){
      echo "<li>" . $Candidats[$i] . "</li>\n";
   }
   echo "</ul>\n";
   
   echo "<h3>Boucle while :</h3>\n";
   echo "<ul>\n";
   $i=0;
   while ($i < count($Candidats)){
      echo "<li>" . $Candidats[$i] . "</li>\n";
      $i++;
   }
   echo "</ul>\n";
   
   echo "<h3>Boucle foreach :</h3>\n";
   echo "<ul>\n";
   foreach ( $Candidats as $value ){
      echo "<li>$value</li>\n";
   }
   echo "</ul>\n";
   echo "<p>Les 3 boucles n'affichent pas la meme chose, seule la foreach est triee !</p>";
   
   // Question 3 :
   $score = array("candidatB"=>300, "candidatA"=>130, "candidatC"=>30);
   
   // Question 4 :
   echo "<table summary='Tableau des scores'>\n";
   echo "<caption>Tableau des scores ( par ordre alpha des scores )</caption>\n";
   echo "<tr><th>index</th><th>valeur</th></tr>\n";
   asort($score);
   foreach ($score as $key => $value) {
      echo "<tr><td>$key</td><td>$value</td></tr>\n";
   }
   echo "</table>\n";
   
   // Question 5 :
   echo "<table summary='Tableau des scores'>\n";
   echo "<caption>Tableau des scores ( par ordre alpha des noms de candidats )</caption>\n";
   echo "<tr><th>index</th><th>valeur</th></tr>\n";
   ksort($score);
   foreach ($score as $key => $value) {
      echo "<tr><td>$key</td><td>$value</td></tr>\n";
   }
   echo "</table>\n";
   ?>
   </body>
</html>