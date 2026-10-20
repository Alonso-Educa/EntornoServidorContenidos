<?php

// Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y
// cambie el valor por el número de la posición

// datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

$datos = [2, 5, 9, 7, 6, 3, 1, 5, 4, 8, 3, 2, 6, 9, 3, 5, 1, 2, 3];
$nuevo = $datos;
for ($i = 0; $i < count($nuevo); $i++) {
    if ($nuevo[$i] == 3)
        $nuevo[$i] = $i;
}

echo "Original: ";
print_r($datos);
echo "<br>Ordenado: ";
print_r($nuevo);

?>