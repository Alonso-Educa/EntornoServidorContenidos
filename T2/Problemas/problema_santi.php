<?php

// Para dos variables numéricas cualquiera $a y $b:

// Imprime a y b

// Calcula c = (a+b)^2
// Calcula d = a^2
// Calcula e = b^2
// Calcula f = a*b
// Calcula g = c/f
// Calcula h = (d+e)/f
// Calcula i = g - h

// Imprime i usando var_dump

// Redondea i usando round() y guárdalo en i_redondeado

// Si i_redondeado es mayor que 2, imprime "Mayor que 2"
// Si no, si i_redondeado es menor que 2, imprime "Menor que 2"
// Si no, imprime "i_redondeado es exactamente 2".

$a = 43;
$b = 23;
echo "a = $a y b = $b.<br>";

$c = ($a + $b) ** 2;
$d = $a ^ 2;
$e = $b ^ 2;
$f = $a * $b;
$g = $c / $f;
$h = ($d + $e) / $f;
$i = $g - $h;

var_dump($i);

$i_redondeado = round($i);

if ($i_redondeado > 2) {
    echo "i_redondeado es mayor que 2.";
} else if ($i_redondeado < 2) {
    echo "i_redondeado es menor que 2.";
} else {
    echo "i_redondeado es exactamente 2.";
}

?>