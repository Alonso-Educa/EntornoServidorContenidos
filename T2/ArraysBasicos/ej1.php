<?php

// Escribe un programa que dado un array ordénalo y devuelve 
// otro array sin que haya elementos repetidos

// datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

$datos = [2, 5, 9, 7, 6, 3, 1, 5, 4, 8, 3, 2, 6, 9, 3, 5, 1, 2, 3];
$nuevo = array_unique($datos);
sort($nuevo);

echo "Original: ";
print_r($datos);
echo "<br>Ordenado: ";
print_r($nuevo);
?>