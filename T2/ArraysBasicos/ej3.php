<?php

// 1 1 1 1
// 1 2 3 4
// 1 3 6 10
// 1 4 10 20

// la primera fila y columnatiene valores 1
// el resto de valores tiene valor de la suma del de arriba y d ela izquierda

$filas = $_POST["num"];

// Se crea una matriz con tantas filas y columnas ocmo se introduzca en el formulario.
// Se rellena con 1 usando fill
$matriz = array_fill(0, $filas, array_fill(0, $filas, 1)); // rellena 1 en las columnas y rellena las columnas en las filas
for ($i = 1; $i < $filas; $i++) {
    for ($j = 1; $j < $filas; $j++) {
        $matriz[$i][$j] = $matriz[$i - 1][$j] + $matriz[$i][$j - 1]; // tiene el mismo valor que la suma de su valor de arriba e izquierda
    }
}

echo "<table border = '1'>";
for ($i = 0; $i < $filas; $i++) {
    echo "<tr>";
    foreach ($matriz[$i] as $valor) {
        echo "<td>$valor</td>";
    }
    echo "</tr>";
}
echo "</table>";