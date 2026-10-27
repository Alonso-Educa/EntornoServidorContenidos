<?php

include_once('EquiposArrays.php');
include_once('EquiposClase.php');

echo "<h1>Prueba con clase:</h1>";

$zam_p_c = ["", new Partido("Zamora", "Salamanca", 3, 2, 1, 0, 0), new Partido("Zamora", "Avila", 4, 1, 0, 0, 0), new Partido("Zamora", "Valladolid", 1, 2, 1, 1, 1)];
$sal_p_c = [new Partido("Salamanca", "Zamora", 3, 2, 1, 0, 0), "", new Partido("Salamanca", "Avila", 4, 1, 0, 0, 0), new Partido("Salamanca", "Valladolid", 1, 2, 1, 2, 1)];
$avi_p_c = [new Partido("Avila", "Zamora", 3, 2, 1, 0, 2), new Partido("Avila", "Salamanca", 1, 3, 1, 3, 0), "", new Partido("Avila", "Valladolid", 1, 3, 1, 0, 1)];
$val_p_c = [new Partido("Valladolid", "Zamora", 3, 2, 1, 0, 0), new Partido("Valladolid", "Salamanca", 3, 1, 0, 0, 0), new Partido("Valladolid", "Valladolid", 1, 2, 1, 1, 2), ""];

$equipos = array(
    "Zamora" => $zam_p_c,
    "Salamanca" => $sal_p_c,
    "Avila" => $avi_p_c,
    "Valladolid" => $val_p_c,
);

// imprimir tabla de equipos
echo "<table border='1'>";
echo "<th bgcolor='red'>Equipos</th>";
foreach ($equipos as $clave => $valor) {
    echo "<th>$clave</th>";
}
foreach ($equipos as $clave => $valor) {
    echo "<tr>";
    echo "<th>$clave</th>";

    foreach ($valor as $partido) {
        if ($partido == "") {
            echo "<td></td>";
        } else {
            echo "<td>";
            echo "<table border='1'>";
            echo "<tr><td colspan='3' bgcolor='green'>" . $partido->getP1() . " - " . $partido->getP2() . "</td></tr>";
            echo "<tr><td  bgcolor='red'>" . $partido->getRoja() . "</td><td  bgcolor='yellow'>" . $partido->getAmarilla() . "</td><td  bgcolor='orange'>" . $partido->getPenalti() . "</td></tr>";
            echo "</table>";
            echo "</td>";
        }
    }

    echo "</tr>";
}
echo "</table>";

echo "<br><br>";
imprimirClasificacionClase($equipos);

echo "<h1>Prueba con Arrays:</h1>";

$zam_p_a = ["", ["Zamora", "Salamanca", 3, 2, 1, 0, 0], ["Zamora", "Avila", 4, 1, 0, 0, 0], ["Zamora", "Valladolid", 1, 2, 1, 1, 1]];
$sal_p_a = [["Salamanca", "Zamora", 3, 2, 1, 0, 0], "", ["Salamanca", "Avila", 4, 1, 0, 0, 0], ["Salamanca", "Valladolid", 1, 2, 1, 2, 1]];
$avi_p_a = [["Avila", "Zamora", 3, 2, 1, 0, 2], ["Avila", "Salamanca", 1, 3, 1, 3, 0], "", ["Avila", "Valladolid", 1, 3, 1, 0, 1]];
$val_p_a = [["Valladolid", "Zamora", 3, 2, 1, 0, 0], ["Valladolid", "Salamanca", 3, 1, 0, 0, 0], ["Valladolid", "Valladolid", 1, 2, 1, 1, 2], ""];

$equipos = array(
    "Zamora" => $zam_p_a,
    "Salamanca" => $sal_p_a,
    "Avila" => $avi_p_a,
    "Valladolid" => $val_p_a,
);

// imprimir tabla de equipos
echo "<table border='1'>";
echo "<th bgcolor='red'>Equipos</th>";
foreach ($equipos as $clave => $valor) {
    echo "<th>$clave</th>";
}
foreach ($equipos as $clave => $valor) {
    echo "<tr>";
    echo "<th>$clave</th>";

    foreach ($valor as $partido) {
        if ($partido == "") {
            echo "<td></td>";
        } else {
            echo "<td>";
            echo "<table border='1'>";
            echo "<tr><td colspan='3' bgcolor='green'>" . $partido[2] . " - " . $partido[3] . "</td></tr>";
            echo "<tr><td  bgcolor='red'>" . $partido[4] . "</td><td  bgcolor='yellow'>" . $partido[5] . "</td><td  bgcolor='orange'>" . $partido[6] . "</td></tr>";
            echo "</table>";
            echo "</td>";
        }
    }

    echo "</tr>";
}
echo "</table>";

echo "<br><br>";
imprimirClasificacionArray($equipos);
?>