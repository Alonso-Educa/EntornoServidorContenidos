<?php

//  EsCrIbE uNa FuNcIóN qUe TrAnSfOrMe UnA cAdEnA eN cAnI.
function cani($s)
{
    $a=str_split(strtolower($s));
    for ($i = 0; $i < count($a); $i += 2) {
        $a[$i]=strtoupper($a[$i]);
    }
    return join($a);
}
echo "Original: Frase de prueba<br>";
echo "Cani: ".cani("Frase de prueba");
?>