<?php

include_once('235palindromo.php');
include_once('235palindromo_bucle.php');

$s = "Frase de prueba";
echo $s . ": ";
var_dump(palindromo($s));
echo "<br>";

$s = "No traces en ese carton";
echo $s . ": ";
var_dump(palindromo($s));
echo "<br>";

$s = "No traces en ese cartón";
echo $s . ": ";
var_dump(palindromo($s));
echo "<br>";



$s = "Frase de prueba";
echo $s . ": ";
var_dump(palindromo_bucle($s));
echo "<br>";

$s = "No traces en ese carton";
echo $s . ": ";
var_dump(palindromo_bucle($s));
echo "<br>";

$s = "No traces en ese cartón";
echo $s . ": ";
var_dump(palindromo_bucle($s));
echo "<br>";

$s = "123454321";
echo $s . ": ";
var_dump(palindromo_bucle($s));
echo "<br>";

$s = "1234554321";
echo $s . ": ";
var_dump(palindromo_bucle($s));

?>