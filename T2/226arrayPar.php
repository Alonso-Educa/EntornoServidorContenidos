<?php

// Una función que averigüe si un número es par: esPar(int $num): bool
function esPar($num)
{
    if ($num % 2 == 0) {
        echo "El numero, $num, es par.<br />";
    } else {
        echo "El numero, $num, es impar.<br />";
    }
}
echo 'Función esPar(int $num): bool</br>';
esPar(12); // Par
esPar(11); // impar

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
echo '</br>Función arrayAleatorio(int $tam, int $min, int $max) : array</br>';
print_r(arrayAleatorio(5,0,100));
echo "</br>";
print_r(arrayAleatorio(10,1,10));
echo "</br>";

// Una función que reciba un $array por referencia y devuelva la cantidad de números pares 
// que hay almacenados y los sustituya por 0: arrayPares(array &$array): int
function arraypares ($a){
    $cont=0;
    echo "Array original: ";
    print_r($a);
    echo "</br>";
    for ($i = 0; $i < count($a); $i++) {
        if($a[$i]%2==0){
            $a[$i]=0;
            $cont++;
        }
    }
    echo "Array cambiado: ";
    print_r($a);
    echo "</br>";
    return $cont;
}
echo '</br>Función arrayPares(array &$array): int</br>';
echo "Habia ".arraypares([1,2,3,4,5,6,7,8,9,10,11,12])." numeros pares en el array.<br>";
echo "Habia ".arraypares([1,3,5,7,9,11])." numeros pares en el array.<br>";
echo "Habia ".arraypares([2,4,6,8,10,12])." numeros pares en el array.<br>";


?>