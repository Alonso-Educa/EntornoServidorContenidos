<?php

include_once('240miContrasenya.php');

miContrasenya(-5, false, true, true);
if (miContrasenya(-5, false, true, true) !== false) {
    echo miContrasenya(-5, false, true, true);
} else {
    echo "Error de validacion.";
}
echo "</br>";
miContrasenya(5, false, true, true, 'hola.');
if (miContrasenya(5, false, true, true, 'hola.') !== false) {
    echo miContrasenya(5, false, true, true, 'hola.');
} else {
    echo "Error de validacion.";
}
echo "</br>";
miContrasenya(5, false, true, true, 'hol4.');
if (miContrasenya(5, false, true, true, 'hol4.') !== false) {
    echo miContrasenya(5, false, true, true, 'hol4.');
} else {
    echo "Error de validacion.";
}
echo "</br>";
miContrasenya(20, true, true, true);
if (miContrasenya(20, true, true, true) !== false) {
    echo miContrasenya(20, true, true, true);
} else {
    echo "Error de validacion.";
}
echo "</br>";

?>