<?php

// Si:

// $a = 10
// $b = 4
// $c = 3
// $d = 2
// Averigua si el resultado es true o false e imprime el resultado por pantalla.

// Se quiere comprobar si:

// El doble de $b, se suma a $a y se resta $d. Se comprueba si el resultado es mayor o igual que 15.
// || el resto de dividir $a entre $b se comprueba si es igual a 0.
// && se comprueba si $e es igual a 2, pero se debe invertir el resultado de esta operación usando !.

$a = 10;
$b = 4;
$c = 3;
$d = 2;

if($b*2 + $a -$d >=15 || $a%$b==0 && !($c==2)){
    echo"El resultado es verdadero.";
}else{
    echo"El resultado es falso.";
}