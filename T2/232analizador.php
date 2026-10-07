<?php

// a partir de una frase con palabras sólo separadas por espacios, devolver

//     Letras totales y cantidad de palabras
//     Una línea por cada palabra indicando su tamaño

// Nota: no se puede usar str_word_count

function analizadorFrase($s)
{
    $a = explode(" ", $s);
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
analizadorFrase($s);

$s = "Prueba2delafuncionparaanalizarpalabras nuevoespacio 2.";
analizadorFrase($s);
?>