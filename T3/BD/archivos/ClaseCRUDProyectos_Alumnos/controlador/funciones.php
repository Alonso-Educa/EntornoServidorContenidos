<?php

require_once '../config/conexion.php';

function validarDni($dni)
{
    if (!preg_match('/^\d{8}[A-Z]$/', strtoupper($dni))) {
        return false;
    }

    $numero = substr($dni, 0, 8);
    $letra = $dni[8];
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    return $letras[$numero % 23] === $letra;
}
function validarEmail($email)
{
    return preg_match('/^[^@.].[^@.]@[^@.].[^@.](.[^@.])*$/', $email);
}

function validarTelefono($telefono)
{
    return preg_match('/^[69]\d{8}$/', $telefono);
}

function validarCiclo($ciclo)
{
    return preg_match('/^[A-Z]{1,}$/', $ciclo);
}

function filtrar($valor)
{
    return strip_tags(trim($valor));
}

function existeDni($dni)
{
    $canal = conexion();

    // se prepara la consulta
    $consulta = mysqli_prepare($canal, "select id_alumno from alumnos where dni = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    // mysqli_stmt_bind_param: bindea dni como string
    mysqli_stmt_bind_param($consulta, "s", $dni);
    // mysqli_stmt_execute: ejecuta la consulta
    mysqli_stmt_execute($consulta);
    // mysqli_stmt_bind_result: indica la variable donde se guarda cada columna del select
    mysqli_stmt_bind_result($consulta, $idEncontrado);
    // mysqli_stmt_fetch: lee la siguiente fila; devuelve true si hay una
    $existe = false;
    if (mysqli_stmt_fetch($consulta)) {
        $existe = true;
    }

    // mysqli_stmt_close y mysqli_close: liberan la consulta y cierran la conexión
    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $existe;
}