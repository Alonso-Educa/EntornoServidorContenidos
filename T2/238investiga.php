<?php

// Investiga las siguientes funciones de cadena (explica para qué sirven mediante comentarios, 
// y programa un pequeño ejemplo de cada una de ellas): 
// ucwords, strrev, str_repeat y md5.

// ucwords: Pone en mayúscula la primera letra de todas las palabras de un string
echo "1. ucwords:<br>";
$s= "hola";
echo "Texto: $s<br>";
echo "ucwords: ".ucwords($s)."<br>";

$s= "cadena larga Mayuscula A a Hola";
echo "Texto: $s<br>";
echo "ucwords: ".ucwords($s)."<br>";

// strrev: Devuelve un string invertido.
echo "<br>2. strrev: <br>";
$s= "hola";
echo "Texto: $s<br>";
echo "strrev: ".strrev($s)."<br>";

$s= "cadena larga Mayuscula A a Hola";
echo "Texto: $s<br>";
echo "strrev: ".strrev($s)."<br>";

// strrepeat: Devuelve un string repetido una cantidad de veces. 
echo "<br>3. strrepeat: <br>";
$s= "hola";
echo "Texto: $s, 10 veces<br>";
echo "strrev: ".str_repeat($s,10)."<br>";

$s= "cadena larga Mayuscula A a Hola";
echo "Texto: $s, 3 veces<br>";
echo "strrev: ".str_repeat($s,3)."<br>";

$s= "hola";
echo "Texto: $s, 0 veces<br>";
echo "strrev: ".str_repeat($s, 0)."<br>";

// md5: Calcula el hash md5 de un string, en forma de un número hexadecimal de 32 caracteres. 
// MD5 es una huella digital de cifrado de 128 bits.
// Suele usarse para comprobar que algún archivo no haya sido modificado.
echo "<br>4. md5:<br>";
$s="Hola";
echo "Texto: $s<br>";
echo "Cifrado md5: ".md5($s)."<br>";

$s="cadena muy larga aaaaaa .....";
echo "Texto: $s<br>";
echo "Cifrado md5: ".md5($s)."<br>";
?>