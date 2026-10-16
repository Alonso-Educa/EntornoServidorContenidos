<?php

// a partir de una frase, devuelve la cantidad de cada una de las vocales, y el total de ellas.
function vocales_ascii($a)
{
    $vocales = array(
        "a" => 0,
        "e" => 0,
        "i" => 0,
        "o" => 0,
        "u" => 0,
    );
    foreach ($a as $valor) {
        $s = chr($valor);
        $vocales["a"] += substr_count($s, 'a');
        $vocales["e"] += substr_count($s, 'e');
        $vocales["i"] += substr_count($s, 'i');
        $vocales["o"] += substr_count($s, 'o');
        $vocales["u"] += substr_count($s, 'u');
        $vocales["a"] += substr_count($s, 'A');
        $vocales["e"] += substr_count($s, 'E');
        $vocales["i"] += substr_count($s, 'I');
        $vocales["o"] += substr_count($s, 'O');
        $vocales["u"] += substr_count($s, 'U');
    }
    return $vocales;
}

?>