<?php

// escribe una función que devuelva un booleano indicando si una palabra es palíndroma 
// (se lee igual de izquierda a derecha que de derecha a izquierda, por ejemplo, “No traces en ese cartón”).

function palindromo($s){
    // se mete cada caracter del string en un array con split
    // el string está en minúsculas y sin espacios para poder compararlo con su palíndromo
    $a=mb_str_split(str_replace(' ','',strtolower($s)));
    $a2=array_reverse($a);
    return $a==$a2;
}

$s= "Frase de prueba";
echo $s.": ";
var_dump(palindromo($s));
echo "<br>";

$s= "No traces en ese carton";
echo $s.": ";
var_dump(palindromo($s));
echo "<br>";

$s= "No traces en ese cartón";
echo $s.": ";
var_dump(palindromo($s));
?>