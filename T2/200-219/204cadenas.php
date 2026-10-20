<?php 
$edad=18;
$c1='Cadena con comillas simples + $edad'; // Las variables en cadenas simples no funcionan
$c2="Cadena con comillas dobles + $edad"; // las comillas dobles hacen el casteo de variable automáticamente a string
echo "$c1,<br> $c2";
?>