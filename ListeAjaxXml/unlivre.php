<?php
  header("Content-Type:text/xml");
  $txt = "<livre><auteur>Maitine Bergounioux</auteur><titre>Mathematiques pour le traitement du signal</titre></livre>";
  $txt=utf8_encode($txt);
  echo $txt;
?>