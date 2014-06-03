<?php

require_once 'get_securise.php';
require_once 'entete.php';

$s = get_securise('screen', $_GET, 'screen.css');
$h = get_securise('handheld', $_GET, 'handheld.css');
$p = get_securise('print', $_GET, 'print.css');

if (( $a = get_securise('all', $_GET))) {
   setcookie('all', $a);
} else {
   $a = get_securise('all', $_COOKIE, 'all.css');
}

echo entete("styles table", array(
    array('rel' => 'stylesheet', 'href' => $a),
    array('rel' => 'stylesheet', 'href' => $p, 'media' => 'print'),
    array('rel' => 'stylesheet', 'href' => $h, 'media' => 'handheld'),
    array('rel' => 'stylesheet', 'href' => $s, 'media' => 'screen')));
echo "<body>\n";
$query = "?screen=$h&amp;handheld=$p&amp;print=$s";
echo "<ul><li><a href='$query'>Rotation des périphériques</a></li>\n";
$all = ($a == 'all.css') ? 'all2.css' : 'all.css';
$query = "?screen=$s&amp;handheld=$h&amp;print=$p&amp;all=$all";
echo "<li><a href='$query'>Permutation des styles</a></li>\n</ul>\n";
include 'edt.html';
echo "</body>\n</html>\n";