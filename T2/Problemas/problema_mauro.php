<?php

// Ejercicio calcular patas y animales de una granja:
// En una granja hay 10 animales, sumando pollos y vacas, contando las patas de todos los animales hay 28 patas en total.
//  muestra por pantalla  la cantidad de pollos y vacas .Comprueba qué cantidad de animales es mayor y muestra por pantalla.

// vacas + pollos = 10;
// 4vacas + 2pollos = 28; -> pollos = (28 - 4vacas)/2 = 14 - 2vacas
// vacas + 14 - 2vacas = 10 -> vacas = 14 - 10

$animales = 10;
$patas = 28;

$vacas = 14 - 10;
$pollos = 10 - $vacas;

echo "En la granja, hay $vacas vacas y tienen " . $vacas * 4 . " patas en total.<br>";
echo "En la granja, hay $pollos pollos y tienen " . $pollos * 2 . " patas en total.<br>";

if ($vacas > $pollos) {
    echo "Hay más vacas que pollos en la granja.";
} else {
    echo "Hay más pollos que vacas en la granja.";
}
?>