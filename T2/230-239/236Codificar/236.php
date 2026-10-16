<?php

include_once('236codificar.php');

$s = "ab ._- \$cd";
echo "Frase original: " . $s . " (1)<br>";
if (codificar($s, 1) != false) {
    echo "Frase codificada: " . codificar($s, 1) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "AB ._- Z\$sSc";
echo "Frase original: " . $s . " (1)<br>";
if (codificar($s, 1) != false) {
    echo "Frase codificada: " . codificar($s, 1) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "abcdefghijklmnopqrstuvxyz";
echo "Frase original: " . $s . " (3)<br>";
if (codificar($s, 3) != false) {
    echo "Frase codificada: " . codificar($s, 3) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "Hholaz";
echo "Frase original: " . $s . " (2)<br>";
if (codificar($s, 2) != false) {
    echo "Frase codificada: " . codificar($s, 2) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "Hholaz";
echo "Frase original: " . $s . " (-2)<br>";
if (codificar($s, -2) != false) {
    echo "Frase codificada: " . codificar($s, 2) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

?>