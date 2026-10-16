<?php

//  investiga que hace la función str_word_count, y vuelve a hacer el ejercicio.
function analizadorFrase2($s)
{
    $a = str_word_count($s, 1); // crea un array con todas las palabras
    $letras = 0;
    echo "<br>Frase: " . $s . "<br>";
    foreach ($a as $palabra) {
        echo "Palabra: " . $palabra . ", tamaño: " . strlen($palabra) . "<br>";
        $letras += strlen($palabra);
    }
    echo "Letras totales: " . $letras . "<br>";
    echo "Cantidad de palabras: " . count($a) . "<br>";
}

?>