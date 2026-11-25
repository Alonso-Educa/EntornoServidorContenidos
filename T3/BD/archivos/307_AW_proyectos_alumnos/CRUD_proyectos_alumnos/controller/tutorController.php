<?php
include_once "../config/conexion.php";

// ---------- COMPROBAR DNI ----------
// devuelve true si ya existe otro tutor con ese dni (también cuenta los tutores eliminados)
// ($id = 0 al insertar; al modificar se excluye el propio tutor)
function existeDniTutor($dni, $id = 0)
{
    $canal = conexion();

    $consulta = mysqli_prepare($canal, "select id_tutor from tutores where dni = ? and id_tutor <> ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "si", $dni, $id);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idEncontrado);
    $existe = false;
    if (mysqli_stmt_fetch($consulta)) {
        $existe = true;
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $existe;
}

// ---------- CREATE ----------
function insertTutor()
{
    // recoge los datos del formulario
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    // el dni es único: si ya existe no se inserta
    if (existeDniTutor($dni)) {
        echo "Ya existe un tutor con ese DNI. <a href='javascript:history.back()'>Volver</a>";
        return;
    }

    $canal = conexion();
    // el campo eliminado no se indica: la base de datos le pone 0 (false) por defecto
    $consulta = mysqli_prepare($canal, "insert into tutores(dni, nombre, apellido1, apellido2, email, telefono) values(?, ?, ?, ?, ?, ?)");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "ssssss", $dni, $nombre, $apellido1, $apellido2, $email, $telefono);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_tutor.php");
    } else {
        echo "Error al insertar el tutor";
    }
}

// ---------- READ ----------
// devuelve un array con los tutores que no están eliminados
function listarTutor()
{
    $canal = conexion();
    // eliminado = 0: los tutores eliminados (borrado lógico) no se muestran
    $consulta = mysqli_prepare($canal, "select id_tutor, dni, nombre, apellido1, apellido2, email, telefono from tutores where eliminado = 0");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idTutor, $dni, $nombre, $apellido1, $apellido2, $email, $telefono);

    $tutores = array();
    while (mysqli_stmt_fetch($consulta)) {
        $tutores[] = array("id_tutor" => $idTutor, "dni" => $dni, "nombre" => $nombre, "apellido1" => $apellido1, "apellido2" => $apellido2, "email" => $email, "telefono" => $telefono);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $tutores;
}

// devuelve un solo tutor (array) a partir de su id
function listarTutorId($id)
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select id_tutor, dni, nombre, apellido1, apellido2, email, telefono from tutores where id_tutor = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $id);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idTutor, $dni, $nombre, $apellido1, $apellido2, $email, $telefono);

    $tutor = null;
    if (mysqli_stmt_fetch($consulta)) {
        $tutor = array("id_tutor" => $idTutor, "dni" => $dni, "nombre" => $nombre, "apellido1" => $apellido1, "apellido2" => $apellido2, "email" => $email, "telefono" => $telefono);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $tutor;
}

// ---------- UPDATE ----------
function modificarTutor()
{
    // recoge los datos del formulario (incluido el id oculto)
    $id = $_POST["id"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    // el dni no puede coincidir con el de otro tutor
    if (existeDniTutor($dni, $id)) {
        echo "Ya existe otro tutor con ese DNI. <a href='javascript:history.back()'>Volver</a>";
        return;
    }

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "update tutores set dni = ?, nombre = ?, apellido1 = ?, apellido2 = ?, email = ?, telefono = ? where id_tutor = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "ssssssi", $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $id);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_tutor.php");
    } else {
        echo "Error al modificar el tutor";
    }
}

// ---------- DELETE (borrado lógico) ----------
function eliminarTutor()
{
    // recoge el id enviado por POST
    $id = $_POST["id"];

    $canal = conexion();
    // no se borra la fila: se marca como eliminado (UPDATE) y deja de mostrarse
    // así los proyectos que tenían ese tutor no pierden la relación y el dato se puede recuperar
    $consulta = mysqli_prepare($canal, "update tutores set eliminado = 1 where id_tutor = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $id);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_tutor.php");
    } else {
        echo "Error al eliminar el tutor";
    }
}

// ---------- QUÉ FUNCIÓN EJECUTAR ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"])) {
        switch ($_POST["accion"]) {
            case "crear":
                insertTutor();
                break;
            case "modificar":
                modificarTutor();
                break;
            case "eliminar":
                eliminarTutor();
                break;
            default:
                header('Location: ../vista/lista_tutor.php');
                exit;
        }
    }
}
