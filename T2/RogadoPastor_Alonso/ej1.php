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
    echo "<$s>";
    echo $s;
    echo "</$s>";
}

// d. letraDni() Se introduce el dni y devuelve la letra que le corresponde
function letraDni($dni)
{
    $a = str_split($dni);
    return $a[count($a)-1];
}

// e. Realiza una página que utilice estas funciones
echo "prueba";
br();
echo "Nuevo parrafo";
br();

h1("hola");
br();
h1("adios");
br();

p("hola");
br();
p("adios");
br();

echo "Dni: 12345678A";
br();
echo "Letra: ".letraDni("12345678A");
?>