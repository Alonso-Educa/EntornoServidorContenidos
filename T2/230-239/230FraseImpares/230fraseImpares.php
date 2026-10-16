<?php

// lee una frase y devuelve una nueva con solo los caracteres de las posiciones impares.
function impares($s)
{
    $s = str_split($s);
    $nuevo = '';
    $i = 0;
    foreach ($s as $valor) {
        if ($i % 2 != 0) {
            $nuevo .= $valor;
        }
        $i++;
    }
    return $nuevo;
}

?>