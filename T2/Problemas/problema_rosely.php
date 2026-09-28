<?php

// Si $a = 8 y $b = 3, averigua el valor de $c si $c es igual a $a por $b más $a entre $b.
// Comprueba que el resultado sea mayor que la suma de $a y $b.

$a = 8;
$b = 3;
$c = ($a * $b) + ($a / $b);

echo "a = $a, b = $b y c = $c.<br>";

if ($c > $a + $b) {
    echo "c es mayor que la suma de a y b.";
} else {
    "La suma de a y b es mayor que c.";
}

?>