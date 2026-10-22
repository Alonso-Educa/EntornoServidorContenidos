<?php

// correccion: probar el ejercicio en nuevo fichero
// correccion de clase: se pasa por referencia en lugar de asignar el valor

include_once('ej2funciones.php');

$a = [];
$b = [];
$c = [];

rellenarArray($a, 1, 10, 10, true);
echo "Valores: ";
foreach ($a as $valor) {
    echo $valor . " ";
}

echo "<br>";

rellenarArray($b, 5, 10, 3, false);
echo "Valores: ";
foreach ($b as $valor) {
    echo $valor . " ";
}
echo "<br>";

// correccion: nuevo caso probando el caso de error
rellenarArray($c, 1, 10, 100, false);
echo "Valores: ";
foreach ($c as $valor) {
    echo $valor . " ";
}
?>