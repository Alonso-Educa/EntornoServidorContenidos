<?php
include_once "../config/conexion.php";

// ---------- COMPROBAR DNI ----------
// devuelve true si ya existe otro alumno con ese dni
// ($id = 0 al insertar; al modificar se excluye el propio alumno)
function existeDni($dni, $id = 0)
{
    $canal = conexion();

    // mysqli_prepare: prepara la consulta; cada ? se sustituirá por un valor
    $consulta = mysqli_prepare($canal, "select id_alumno from alumnos where dni = ? and id_alumno <> ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    // mysqli_stmt_bind_param: une las variables a los ? en orden; s = texto, i = entero
    mysqli_stmt_bind_param($consulta, "si", $dni, $id);
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

// ---------- CREATE ----------
function insertAlumno()
{
    // recoge los datos del formulario
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $ciclo = $_POST["ciclo"];

    // el dni es único: si ya existe no se inserta
    if (existeDni($dni)) {
        echo "Ya existe un alumno con ese DNI. <a href='javascript:history.back()'>Volver</a>";
        return;
    }

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "insert into alumnos(dni, nombre, apellido1, apellido2, email, telefono, ciclo) values(?, ?, ?, ?, ?, ?, ?)");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "sssssss", $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $ciclo);
    // mysqli_stmt_execute devuelve true si todo ha ido bien
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        // vuelve al listado, que se muestra actualizado
        header("Location: ../vista/lista_alumno.php");
    } else {
        echo "Error al insertar el alumno";
    }
}

// ---------- READ ----------
// devuelve un array con todos los alumnos
function listarAlumno()
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select id_alumno, dni, nombre, apellido1, apellido2, email, telefono, ciclo from alumnos");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idAlumno, $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $ciclo);

    // por cada fila leída se guarda un array con sus datos dentro del array de alumnos
    $alumnos = array();
    while (mysqli_stmt_fetch($consulta)) {
        $alumnos[] = array("id_alumno" => $idAlumno, "dni" => $dni, "nombre" => $nombre, "apellido1" => $apellido1, "apellido2" => $apellido2, "email" => $email, "telefono" => $telefono, "ciclo" => $ciclo);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $alumnos;
}

// devuelve un solo alumno (array) a partir de su id
function listarAlumnoId($id)
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select id_alumno, dni, nombre, apellido1, apellido2, email, telefono, ciclo from alumnos where id_alumno = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $id);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idAlumno, $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $ciclo);

    // solo se lee una fila
    $alumno = null;
    if (mysqli_stmt_fetch($consulta)) {
        $alumno = array("id_alumno" => $idAlumno, "dni" => $dni, "nombre" => $nombre, "apellido1" => $apellido1, "apellido2" => $apellido2, "email" => $email, "telefono" => $telefono, "ciclo" => $ciclo);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $alumno;
}

// ---------- UPDATE ----------
function modificarAlumno()
{
    // recoge los datos del formulario (incluido el id oculto)
    $id = $_POST["id"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $ciclo = $_POST["ciclo"];

    // el dni no puede coincidir con el de otro alumno
    if (existeDni($dni, $id)) {
        echo "Ya existe otro alumno con ese DNI. <a href='javascript:history.back()'>Volver</a>";
        return;
    }

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "update alumnos set dni = ?, nombre = ?, apellido1 = ?, apellido2 = ?, email = ?, telefono = ?, ciclo = ? where id_alumno = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "sssssssi", $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $ciclo, $id);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_alumno.php");
    } else {
        echo "Error al modificar el alumno";
    }
}

// ---------- DELETE ----------
function eliminarAlumno()
{
    // recoge el id enviado por POST
    $id = $_POST["id"];

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "delete from alumnos where id_alumno = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $id);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_alumno.php");
    } else {
        echo "Error al eliminar el alumno";
    }
}

// ---------- QUÉ FUNCIÓN EJECUTAR ----------
// solo actúa cuando un formulario envía una petición POST con "accion";
// si una vista incluye este fichero solo para usar listarAlumno(), no se ejecuta nada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"])) {
        switch ($_POST["accion"]) {
            case "crear":
                insertAlumno();
                break;
            case "modificar":
                modificarAlumno();
                break;
            case "eliminar":
                eliminarAlumno();
                break;
            default:
                header('Location: ../vista/lista_alumno.php');
                exit;
        }
    }
}
