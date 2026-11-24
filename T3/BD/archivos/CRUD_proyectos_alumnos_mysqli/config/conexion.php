<?php

include_once "../../../../../../seguridad/tema03/datosBDproyectos.php";

// devuelve la conexión a la base de datos
function conexion()
{
    // mysqli_connect(servidor, usuario, contraseña, base de datos) abre la conexión
    // @ oculta el aviso de PHP si falla; el error se comprueba justo después
    $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
    if (!$canal) {
        echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
        exit;
    }

    // codificación utf8
    mysqli_set_charset($canal, "utf8");
    return $canal;
}