<?php

// Una función que devuelva el mayor de todos los números recibidos como parámetros: 
// function mayor(): int. Utiliza las funciones func_get_args(), etc... No puedes usar la función max().
function mayor(...$numeros){
    $max=0;
    $numargs = func_num_args(); // igual que count

    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        if ($max<func_get_arg($i)){
            $max = $arg_list[$i];
        }
    }
    return $max;
}
echo 'Función mayor(): int</br>';
echo "El numero mayor del array es: ".mayor(1,2,3,4,5,6,7,8,9,10,11,12).".<br>";
echo "El numero mayor del array es: ".mayor(1,20,300,45,55,67,75,8,999,105,11,1200).".<br>";

// Una función que concatene todos los parámetros recibidos separándolos con un espacio: 
// function concatenar(...$palabras) : string. Utiliza el operador ... .
function concatenar(...$palabras){
    $s = "";
    for ($i= 0; $i<count($palabras); $i++) {
        $s .= $palabras[$i]; // .= equivale a += para concatenar strings
    }
    return $s;
}
echo '</br>Función concatenar(...$palabras): string';
echo "</br>".concatenar("hola","hola2",",","a","juan","alonso");
echo "</br>".concatenar("palabra1","palabra2","palabra3","palabra4","palabra5","palabra6");

?>