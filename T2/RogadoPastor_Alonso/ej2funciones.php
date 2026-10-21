<?php

// Haz una función que genere números aleatorios que se le pase como parámetros:

// a. Array para lo rellene con los números
// b. Número mínimo incluido
// c. Número máximo incluido
// d. Numero de números generados
// e. True si puedes repetirse/ False si no pueden repetirse
function rellenarArray($a, $min, $max, $cant, $bool)
{
    // correccion de casa
    // el boolean estaba al revés. También se pasa el texto como array para que se muestre más cómodamente
    if (!$bool && $cant > $max) {
        return ["Error con las condiciones introducidas."];
    }
    for ($i = 0; $i < $cant; $i++) {
        if ($bool) {
            $n = rand($min, $max);
            array_push($a, $n);
        } else {
            do {
                $n = rand($min, $max);
                // correccion de casa
                // cambiado array_search por in_array para que funcione lo de no repetir
            } while (in_array($n, $a));
            array_push($a, $n);
        }
    }
    return $a;
}

?>