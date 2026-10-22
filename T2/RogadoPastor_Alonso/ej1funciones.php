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
    // correccion de clase
    echo "<p>$s</p>";
}

// d. letraDni() Se introduce el dni y devuelve la letra que le corresponde
function letraDni($dni)
{
    $a = str_split($dni);
    return $a[count($a) - 1];
}

?>