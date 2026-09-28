<?php

// Calcular el area y perimetro de un cuadrado, un rectangulo un triangulo rectangulo y mostrarlas en pantalla.
// Una vez calcuados, decir cual es el area mas grande de las figuras, y la mas pequeña y mostrarlas en pantalla.
// Lados cuadrado = 4
// Lado rectangulo = 6 altura rectangulo = 3
// Triangulo rectangulo catetos = 2 hipotenusa = 2.82
// Todas las unidades en metros.

$lc = 4; // cuadrado
$lr = 6; // rect
$hr = 3;
$ct = 2; // tria
$ht = 2.82;

$area_c = $lc * $lc;
$area_r = $lr * $hr;
$area_t = ($ct * $ct) / 2;

echo "El cuadrado tiene perimetro de " . $lc * 4 . "m y area de " . $area_c . "m^2<br>";
echo "El rectangulo tiene perimetro de " . $lr * 2 + $hr * 2 . "m y area de " . $area_r . "m^2<br>";
echo "El triangulo tiene perimetro de " . 2 * $ct + $ht . "m y area de " . $area_t . "m^2<br><br>";

if ($area_c <= $area_r && $area_c <= $area_t) {
   echo "El área del cuadrado es la menor.<br>";
} elseif ($area_r <= $area_c && $area_r <= $area_t) {
    echo "El área del rectángulo es la menor.<br>";
} else {
    echo "El área del triángulo es la menor.<br>";
}

if ($area_c >= $area_r && $area_c >= $area_t) {
    echo "El área del cuadrado es la mayor";
} else if ($area_r >= $area_c && $area_r >= $area_t) {
    echo "El área del rectángulo es la mayor";
} else {
    echo "El área del triángulo es la mayor";
}

?>