<?php

function entete($title, $link_r=array()){
   $link_str = "";
   foreach ( $link_r as $link ){
      $link_str .= "<link ";
      foreach ( $link as $attr => $val ){
	 $link_str .= htmlspecialchars($attr) . "='" . htmlspecialchars($val) . "' ";
      }
      $link_str .= " />\n";
   }
   return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n" .
	   "<html xml:lang='fr' lang='fr' xmlns='http://www.w3.org/1999/xhtml'>\n" . 
	   "<head>\n" .
	   "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />\n" .
	   "<title>" . htmlspecialchars($title) . "</title>\n" .
	   $link_str .
	   "</head>";
}

