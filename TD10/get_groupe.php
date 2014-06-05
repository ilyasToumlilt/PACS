<?php

// Un exemple très intuitif donné par le prof :
$groupes = array(
    1 => array('a', 'b', 'c'),
    2 => array('d', 'e', 'f', 'g'),
    3 => array('h', 'i'),
    4 => array('j', 'k', 'l')
);

// Anyway, on passe au sérieux :
if (isset($_GET['groupe']) && is_numeric($_GET['groupe']) && isset($groupes[intval($_GET['groupe'])])) {
   header('Content-Type: text/plain');
   echo join(";", $groupes[intval($_GET['groupe'])]) . ";";
} else {
   header("HTTP/1.1 204 No Content");  
}
