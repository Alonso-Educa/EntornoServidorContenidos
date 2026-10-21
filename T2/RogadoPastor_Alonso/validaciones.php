<?php

function validaNombre($nom)
{
    $in = str_split($nom);
    return str_starts_with($nom, strtoupper($in[0]));
}

function validaApe($ape)
{
    $in = str_split($ape);
    return str_starts_with($ape, strtoupper($in[0]));
}

// function validaAsi($asi)
// {
//     return date();
// }

function validaDni($dni)
{
    $a = str_split($dni);
    for ($i = 0; $i < 8; $i++) {
        if (!is_numeric($a[$i])) {
            return false;
        }
    }
    if (count($a) != 9 || is_numeric($a[count($a) - 1])) {
        return false;
    }
    if (!str_starts_with($a[count($a) - 1], strtoupper($a[count($a) - 1]))) {
        return false;
    } else {
        return true;
    }
}

function validaFec($fec)
{
    $a = str_split($fec);
    if ($a[4] !== '-' || $a[7] !== '-') {
        return false;
    } else if (!is_numeric($a[0]) || !is_numeric($a[1]) || !is_numeric($a[2]) || !is_numeric($a[3]) || !is_numeric($a[5]) || !is_numeric($a[6]) || !is_numeric($a[8]) || !is_numeric($a[9])) {
        return false;
    }
    return true;
}

function validaEma($ema)
{
    if (!str_contains($ema, '@')) {
        return false;
    } else if (!str_contains($ema, '.')) {
        return false;
    } else {
        return true;
    }
}


