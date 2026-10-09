<?php

// utilizando las funciones para trabajar con caracteres, a partir de una cadena y un desplazamiento enviados por formulario:

//     Si el desplazamiento es 1, sustituye la A por B, la B por C, etc.
//     El desplazamiento no puede ser negativo
//     Si se sale del abecedario, debe volver a empezar

// Hay que respetar los espacios, puntos y comas.

function codificar($s, $d)
{
    if (is_int($d) && $d > 0) {
        $s = str_split($s);
        $a = [];
        $i = 0;
        foreach ($s as $valor) {
            $valor = ord($valor);
            if ($valor >= ord('a') && $valor <= ord('z')) {
                $valor += +$d;
                if ($valor > ord('z')) {
                    $valor -= (ord('z') - ord('a') + 1);
                }
            } else if ($valor >= ord('A') && $valor <= ord('Z')) {
                $valor += $d;
                if ($valor > ord('Z')) {
                    $valor -= (ord('Z') - ord('A') + 1);
                }
            }
            $a[$i] = chr($valor);
            $i++;
        }
        $cifrado = join($a);
        return $cifrado;
    } else {
        return false;
    }
}

$s = "ab ._- \$cd";
echo "Frase original: " . $s . " (1)<br>";
if (codificar($s, 1)!=false) {
    echo "Frase codificada: " . codificar($s, 1) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "AB ._- Z\$sSc";
echo "Frase original: " . $s . " (1)<br>";
if (codificar($s, 1)!=false) {
    echo "Frase codificada: " . codificar($s, 1) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "abcdefghijklmnopqrstuvxyz";
echo "Frase original: " . $s . " (3)<br>";
if (codificar($s, 3)!=false) {
    echo "Frase codificada: " . codificar($s, 3) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "Hholaz";
echo "Frase original: " . $s . " (2)<br>";
if (codificar($s, 2)!=false) {
    echo "Frase codificada: " . codificar($s, 2) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}

$s = "Hholaz";
echo "Frase original: " . $s . " (-2)<br>";
if (codificar($s, -2)!=false) {
    echo "Frase codificada: " . codificar($s, 2) . "<br><br>";
} else {
    echo "El desplazamiento no puede ser negativo.<br><br>";
}
?>