<?php

include_once('ej3funciones.php');

// Genera con dos arrays multidimensionales el
// euromillones.
// a. muéstralo como en la figura
// b. los números amarillos vendrán por variables
// de la url:
// i. var1….var5 b
// ii. especial1 y especial2
// c. Utiliza la función generaloteria para generar
// dinámicamente los números galardonados.
// d. Pinta los galardonados en verde
// e. Escribe un resumen de cuantos números
// normales ha acertado y cuantos números
// especiales ha acertado

$jugadorMatriz = [$_GET["var1"] ?? "", $_GET["var2"] ?? "", $_GET["var3"] ?? "", $_GET["var4"] ?? "", $_GET["var5"] ?? ""];
$jugadorEsp = [$_GET["esp1"] ?? "", $_GET["esp2"] ?? ""];

$tableroGalardonados = generaLoteria(50, 5);
$especialGalardonados = generaLoteria(12, 2);

$tablero = [];
$esp = [];
$cont = 0;
for ($i = 0; $i < 7; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $tablero[$i][$j] = ++$cont;
    }
}
$tablero[7][0] = ++$cont;

$cont = 0;
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $esp[$i][$j] = ++$cont;
    }
}

// pntar las matrices en base a los valors aleatorios y del jgdador
echo "<h3>Matriz de loteria</h3>";
echo "<table border='1'>";
foreach ($tablero as $fila) {
    echo "<tr>";
    foreach ($fila as $valor) {
        if (in_array($valor, $tableroGalardonados)) {
            echo "<td><span style='color:green'>$valor</span></td>";
        } elseif (in_array($valor, $jugadorMatriz)) {
            echo "<td><span style='color:yellow'>$valor</span></td>";
        } else {
            echo "<td>$valor</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

echo "<br>";

echo "<h3>Matriz de numeros especiales</h3>";
echo "<table border='1'>";
foreach ($esp as $fila) {
    echo "<tr>";
    foreach ($fila as $valor) {
        if (in_array($valor, $especialGalardonados)) {
            echo "<td><span style='color:green'>$valor</span></td>";
        } elseif (in_array($valor, $jugadorEsp)) {
            echo "<td><span style='color:yellow'>$valor</span></td>";
        } else {
            echo "<td>$valor</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

// Resumen
$aciertosNum = count(array_intersect(array_unique($jugadorMatriz), $tableroGalardonados));
$aciertosEsp = count(array_intersect(array_unique($jugadorEsp), $especialGalardonados));

echo "<h3>Resumen</h3>";
echo "Has acertado $aciertosNum números normales<br>";
echo "Has acertado $aciertosEsp números especiales<br>";
?>