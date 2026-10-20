<?php

const FILAS = 3;
// También se puede hacer usando codigo ascii del espacio (32)
echo "Ejercicio 1: <br>";
for ($i = 0; $i < FILAS; $i++) {
    for ($j = 0; $j < FILAS - 1 - $i; $j++) {
        echo "&ensp;";
    }
    for ($j = 0; $j < ($i * 2) + 1; $j++) {
        echo "*";
    }
    echo "<br>";
}

?>