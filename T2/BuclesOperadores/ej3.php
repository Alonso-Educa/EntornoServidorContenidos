<?php

//   *      2 1 2
//  * *   1 1 1 1 1
// *   *  0 1 3 1 0
//  * *
//   *

const FILAS = 10;
echo "Ejercicio 3: <br>";
for ($i = 0; $i < FILAS; $i++) {
    for ($j = 0; $j < FILAS - 1 - $i; $j++) {
        echo "&ensp;";
    }
    if ($i != 0) {
        echo "*";
        for ($j = 0; $j < ($i * 2) - 1; $j++) {
            echo "&ensp;";
        }
        echo "*";
    } else {
        echo "*";
    }
    echo "<br>";
}
for ($i = FILAS - 1; $i > 0; $i--) {
    for ($j = 0; $j < FILAS - $i; $j++) {
        echo "&ensp;";
    }

    if ($i != 1) {
        echo "*";
        for ($j = 0; $j < ($i - 1) * 2 - 1; $j++) {
            echo "&ensp;";
        }
        echo "*";
    } else {
        echo "*";
    }
    echo "<br>";
}


?>