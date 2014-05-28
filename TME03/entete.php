<?php

  function entete ( $title_content ) {
    $string_header="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n";
    $string_header.="<html xmlns=\"http://www.w3.org/1999/xhtml\" \"xml:lang=\"fr\" lang=\"fr\">\n";
    $string_header.="<head>\n";
    $string_header.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
    $string_header.="<title>".$title_content."</title>\n";
    $string_header.="</head>\n";

    return $string_header;
  }
?>