<?php
$array = [];
$max = 0;
$min = 100;
$suma = 0;

// Tambien se puede usar sort para ordenar y evitarse condicionales: min = $array[0] y max = $array[32]
// Otra forma de sacar el mayor y menor es hacer min = $min(array) y max = max(array)
// Estas formas son menos eficientes pero más cortas y legibles

// if-else es más eficiente que recorrer un bucle

for ($i = 0; $i < 33; $i++) {
    $array[$i] = rand(0, 100);
    if ($array[$i] > $max) {
        $max = $array[$i];
    }
    if ($array[$i] < $min) {
        $min = $array[$i];
    }
    $suma += $array[$i];
}
echo "El mayor número ha sido el $max.<br>";
echo "El menor número ha sido el $min.<br>";
echo "La media ha sido de " . round($suma / 33, 2) . ".<br>";

?>