<?php

include 'entete.php';

echo entete('Formulaire Soumission');
?>

<body>
   <h3> Formulaire de soumission </h3>
   
   <form method="post" action="" >
      <fieldset>
	 <label for="numEtu">Num&eacute;ro &eacute;tudiant : </label>
	 <input id="numEtu" name="numEtu" type="text" /><br/>
	 
	 <label for="mail">Adresse Mail : </label>
	 <input id="mail" name="mail" type="text" /><br/>
	 
	 <!-- premiere version avec name specifique 
	 <input type="checkbox" id="ficSoum" name="ficSoum" />
	 <label for="ficSoum">Fichier &agrave; soumettre</label><br/>
	 <input type="checkbox" id="ficMail" name="ficMail" />
	 <label for="ficMail">Fichier par mail</label><br/>
	 -->
	 
	 <!-- version avec name array -->
	 <input type="checkbox" id="ficSoum" name="file[]" />
	 <label for="ficSoum">Fichier &agrave; soumettre</label><br/>
	 
	 <input type="checkbox" id="ficMail" name="file[]" />
	 <label for="ficMail">Fichier par mail</label><br/>
	 
	 <input type="submit" name="send" value="soumettre" />
      </fieldset>
   </form>
</body>
</html>
