<?php

function validaNombre($nom)
{
    return preg_match("/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)?$/u", $nom);
}

function validaApe($ape)
{
    return preg_match("/^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)?$/u", $ape);
}

function validaFec($fec)
{
    return preg_match("/^[1-2]\d{3}-[0-1]\d-[0-3]\d$/", $fec);
}

function validaDni($dni)
{
    return preg_match("/^\d{8}[A-Z]$/", $dni);
}

function validaAsi($asi)
{
    if (!in_array("Entorno Servidor", $asi) && !in_array("Entorno Cliente", $asi) && !in_array("Frameworks", $asi)) {
        return false;
    } else{
        return true;
    }
}

function validaEma($ema)
{
    return preg_match("/^\w+@\w+\.\w+$/",$ema);
}