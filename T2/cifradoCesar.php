<?php

function cifradoCesar($s, $d)
{
    $s = str_split($s);
    $a = [];
    $i = 0;
    foreach ($s as $valor) {
        $valor = ord($valor);
        if ($valor >= ord('a') && $valor <= ord('z')) {
            $valor += + $d;
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
}


function descifradoCesar($s, $d)
{
    $s = str_split($s);
    $a = [];
    $i = 0;
    foreach ($s as $valor) {
        $valor=ord($valor);
        if ($valor >= ord('a') && $valor <= ord('z')) {
            $valor -= $d;
            if ($valor < ord('a')) {
                $valor += (ord('z') - ord('a') + 1);
            }
        } else if ($valor >= ord('A') && $valor <= ord('Z')) {
            $valor -= $d;
            if ($valor < ord('A')) {
                $valor += (ord('Z') - ord('A') + 1);
            }
        }

        $a[$i] = chr($valor);
        $i++;
    }

    $descifrado = join($a);
    return $descifrado;
}

?>