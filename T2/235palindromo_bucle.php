<?php

// escribe una función que devuelva un booleano indicando si una palabra es palíndroma 
// (se lee igual de izquierda a derecha que de derecha a izquierda, por ejemplo, “No traces en ese cartón”).

// version con bucle
// pendiente cambiar tildes
function palindromo($s){
    // se mete cada caracter del string en un array con split
    // el string está en minúsculas y sin espacios para poder compararlo con su palíndromo
    $a=mb_str_split(str_replace(' ','',strtolower($s)));
    for($i=0;$i<count($a)/2;$i++){
        if($a[$i] != $a[count($a)-$i-1]){
            return false;
        }
    }
    return true;
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
echo "<br>";

$s= "123454321";
echo $s.": ";
var_dump(palindromo($s));
echo "<br>";

$s= "1234554321";
echo $s.": ";
var_dump(palindromo($s));
?>