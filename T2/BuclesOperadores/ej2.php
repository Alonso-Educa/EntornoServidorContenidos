<?php

const FILAS = 3;
echo "Ejercicio 2: <br>";
for ($i = 0; $i < FILAS; $i++) {
    for ($j = 0; $j < FILAS - 1 - $i; $j++) {
        echo "&ensp;";
    }
    for ($j = 0; $j < ($i * 2) + 1; $j++) {
        echo "*";
    }
    echo "<br>";
}
for ($i = FILAS - 1; $i > 0; $i--) {
    for ($j = 0; $j < FILAS - $i; $j++) {
        echo "&ensp;";
    }
    for ($j = 0; $j < ($i - 1) * 2 + 1; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>