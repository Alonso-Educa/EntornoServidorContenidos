<?php

// Crea tu propio fichero de php que tenga las funciones de:

// a. br() Pinta un br
function br()
{
    echo "<br>";
}

// b. h1( cadena ) Pinta la cadena entre dos h1
function h1($s)
{
    echo "<h1>$s</h1>";
}

// c. p(cadena) Pinta la cadena entre cadenas
function p($s)
{
    // correccion de casa
    // uso de cracerteres especiales para mostrar las etiquetas correctamente y que no se las trague
    echo htmlspecialchars("<$s>");
    echo $s;
    echo htmlspecialchars("</$s>");
}

// d. letraDni() Se introduce el dni y devuelve la letra que le corresponde
function letraDni($dni)
{
    $a = str_split($dni);
    return $a[count($a) - 1];
}

?>