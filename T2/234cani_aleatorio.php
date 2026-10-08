<?php

//  EsCrIbE uNa FuNcIóN qUe TrAnSfOrMe UnA cAdEnA eN cAnI. (2/3 minuscula 1/3 mayuscula)
function cani($s)
{
    $a = str_split($s);
    for ($i = 0; $i < count($a); $i++) {
        $n = rand(1, 3);
        if ($n > 2) {
            $a[$i] = strtoupper($a[$i]);
        } else {
            $a[$i] = strtolower($a[$i]);
        }

    }
    return join($a);
}
$s="Frase de prueba12abshdirejba,aass";
echo "Original: $s<br>";
echo "Cani: " . cani($s);
?>