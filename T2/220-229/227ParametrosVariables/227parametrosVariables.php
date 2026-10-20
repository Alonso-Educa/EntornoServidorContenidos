<?php

// Una función que devuelva el mayor de todos los números recibidos como parámetros: 
// function mayor(): int. Utiliza las funciones func_get_args(), etc... No puedes usar la función max().
function mayor(...$numeros)
{
    $max = 0;
    $numargs = func_num_args(); // igual que count

    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        if ($max < func_get_arg($i)) {
            $max = $arg_list[$i];
        }
    }
    return $max;
}

// Una función que concatene todos los parámetros recibidos separándolos con un espacio: 
// function concatenar(...$palabras) : string. Utiliza el operador ... .
function concatenar(...$palabras)
{
    $s = "";
    for ($i = 0; $i < count($palabras); $i++) {
        $s .= $palabras[$i]; // .= equivale a += para concatenar strings
    }
    return $s;
}

?>