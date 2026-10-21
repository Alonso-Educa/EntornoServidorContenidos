<?php

// correccion: probar el ejercicio en nuevo fichero
include_once('ej2funciones.php');

$a = [];
$b = [];
$c = [];

$a = rellenarArray($a, 1, 10, 10, true);
echo "Valores: ";
foreach ($a as $valor) {
    echo $valor . " ";
}

echo "<br>";

$b = rellenarArray($b, 5, 10, 3, false);
echo "Valores: ";
foreach ($b as $valor) {
    echo $valor . " ";
}
echo "<br>";

// correccion decasa
// nuevo caso probando el caso de error
$c = rellenarArray($c, 1, 10, 100, false);
echo "Valores: ";
foreach ($c as $valor) {
    echo $valor . " ";
}
?>