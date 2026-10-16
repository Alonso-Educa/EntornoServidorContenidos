<?php

include_once('234cani.php');
include_once('234cani_aleatorio.php');

echo "Original: Frase de prueba12345<br>";
echo "Cani: ".cani("Frase de prueba12345");
echo "<br>";

$s="Frase de prueba12abshdirejba,aass";
echo "Original: $s<br>";
echo "Cani: " . cani_aleatorio($s);
?>