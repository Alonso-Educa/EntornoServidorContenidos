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
$s = "Hola esto es un array de prueba para la funcion .";
analizadorFrase2($s);

$s = "Prueba2delafuncionparaanalizarpalabras nuevoespacio 2.";
analizadorFrase2($s);
?>