<?php

// Question 1 :
define("RE_NUMERO","/Numéro d'étudiant : ([1-9]\d{6})\D/");

// Question 2 :
// le s permet de changer d'accepter les \n dans le .* dans le cas ou y aurait des retours chariot.
define("RE_OREMUN","/^.*Numéro d'étudiant : ([1-9]\d{6})\D/s");

