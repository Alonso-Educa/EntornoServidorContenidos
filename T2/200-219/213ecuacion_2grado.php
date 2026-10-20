<?php

$a = 1;
$b = -2;
$c = -3;
$raiz = $b * $b - 4 * $a * $c;
echo"La ecuación es $a x^2 + $b x + $c.<br>";
if ($raiz < 0) {
    echo "La ecuación no tiene solución.";
} else {
    $opM = (-$b + sqrt($raiz)) / 2 * $a;
    $opm = (-$b - sqrt($raiz)) / 2 * $a;

    echo "La ecuación tiene como solución: $opM y $opm.";
}

?>