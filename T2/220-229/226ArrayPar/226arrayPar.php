<?php

// Una función que averigüe si un número es par: esPar(int $num): bool
function esPar($num)
{
    return $num % 2;
}

// Una función que devuelva un array de tamaño $tam con números aleatorios comprendido entre $min y $max : 
// arrayAleatorio(int $tam, int $min, int $max) : array
function arrayAleatorio($tam, $min, $max)
{
    $a = [];
    for ($i = 0; $i < $tam; $i++) {
        $a[$i] = rand($min, $max);
    }
    return $a;
}

// Una función que reciba un $array por referencia y devuelva la cantidad de números pares 
// que hay almacenados y los sustituya por 0: arrayPares(array &$array): int
function arraypares($a)
{
    $cont = 0;
    echo "Array original: ";
    print_r($a);
    echo "</br>";
    for ($i = 0; $i < count($a); $i++) {
        if ($a[$i] % 2 == 0) {
            $a[$i] = 0;
            $cont++;
        }
    }
    echo "Array cambiado: ";
    print_r($a);
    echo "</br>";
    return $cont;
}

?>