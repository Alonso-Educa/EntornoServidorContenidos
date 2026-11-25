<?php
// devuelve la conexión a la base de datos
function conexion()
{
    // desactiva las excepciones de mysqli (PHP 8.1+) para poder comprobar los errores con if
    mysqli_report(MYSQLI_REPORT_OFF);

    // mysqli_connect(servidor, usuario, contraseña, base de datos) abre la conexión
    // @ oculta el aviso de PHP si falla; el error se comprueba justo después
    $canal = @mysqli_connect("localhost", "proyectos_alumnos", "12345", "proyectos_alumnos");
    if (!$canal) {
        echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
        exit;
    }

    // codificación utf8 (acentos y ñ)
    mysqli_set_charset($canal, "utf8");
    return $canal;
}
