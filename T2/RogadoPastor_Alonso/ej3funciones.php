<?php

function generaLoteria($max, $cant)
{
    $a = [];
    for ($i = 0; $i < $cant; $i++) {
        do {
            $n = rand(1, $max);
        } while (in_array($n, $a));
        array_push($a, $n);
    }
    return $a;
}

?>