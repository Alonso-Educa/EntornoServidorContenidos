<?php
include_once "../config/conexion.php";

// tamaño máximo del logotipo: 1 MB
define("MAX_LOGOTIPO", 1048576);

// ---------- FUNCIONES AUXILIARES ----------

// devuelve el contenido (binario) de la imagen subida, o "" si no se ha seleccionado ninguna
function leerLogotipo()
{
    // $_FILES contiene los ficheros enviados por el formulario (enctype="multipart/form-data")
    $fichero = $_FILES["logotipo"];

    // UPLOAD_ERR_NO_FILE: no se ha seleccionado ningún fichero
    if ($fichero["error"] == UPLOAD_ERR_NO_FILE) {
        return "";
    }
    // error al subir o imagen demasiado grande
    if ($fichero["error"] != UPLOAD_ERR_OK || $fichero["size"] > MAX_LOGOTIPO) {
        echo "El logotipo no se ha podido subir o supera 1 MB. <a href='javascript:history.back()'>Volver</a>";
        exit;
    }
    // getimagesize devuelve false si el fichero no es una imagen
    if (!getimagesize($fichero["tmp_name"])) {
        echo "El logotipo debe ser una imagen. <a href='javascript:history.back()'>Volver</a>";
        exit;
    }
    // file_get_contents lee el fichero temporal y devuelve su contenido en binario
    return file_get_contents($fichero["tmp_name"]);
}

// guarda el pdf subido en public/storage/pdf y devuelve la ruta que se guarda en la base de datos
// devuelve "" si no se ha seleccionado ningún fichero
function subirPdf()
{
    $fichero = $_FILES["pdf_proyecto"];

    if ($fichero["error"] == UPLOAD_ERR_NO_FILE) {
        return "";
    }
    // solo se admite la extensión pdf
    $extension = strtolower(pathinfo($fichero["name"], PATHINFO_EXTENSION));
    if ($fichero["error"] != UPLOAD_ERR_OK || $extension != "pdf") {
        echo "El fichero debe ser un PDF válido. <a href='javascript:history.back()'>Volver</a>";
        exit;
    }

    // nombre único: fecha y hora del sistema + nombre original (sin caracteres raros)
    $nombre = date("Ymd_His") . "_" . preg_replace("/[^A-Za-z0-9._-]/", "_", basename($fichero["name"]));

    // move_uploaded_file mueve el fichero temporal a su carpeta definitiva
    if (!move_uploaded_file($fichero["tmp_name"], __DIR__ . "/../public/storage/pdf/" . $nombre)) {
        echo "No se ha podido guardar el pdf. <a href='javascript:history.back()'>Volver</a>";
        exit;
    }

    // ruta desde la raíz del servidor hasta el fichero (es lo que se guarda en la base de datos)
    return "CRUD_proyectos_alumnos/public/storage/pdf/" . $nombre;
}

// devuelve la URL de acceso completa al pdf a partir de la ruta guardada en la base de datos
function urlPdf($ruta)
{
    return "http://" . $_SERVER["SERVER_NAME"] . "/" . $ruta;
}

// devuelve el logotipo (guardado en binario) preparado para usarlo en <img src="...">
function imagenDatos($logotipo)
{
    if ($logotipo == "") {
        return "";
    }
    // getimagesizefromstring obtiene el tipo de imagen (mime) a partir de su contenido
    $info = getimagesizefromstring($logotipo);
    // base64_encode convierte el binario en texto para poder incrustarlo en el html
    return "data:" . $info["mime"] . ";base64," . base64_encode($logotipo);
}

// ---------- CREATE ----------
function insertProyecto()
{
    // recoge los datos del formulario
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $periodo = $_POST["periodo"];
    $curso = $_POST["curso"];
    $fecha = $_POST["fecha_presentacion"];
    $alumno = $_POST["alumno"];
    $tutor = $_POST["tutor"];

    // la nota es opcional: si está vacía se guarda NULL
    $nota = null;
    if ($_POST["nota"] != "") {
        $nota = $_POST["nota"];
    }

    // imagen (se guarda en la base de datos) y pdf (se guarda en storage)
    $logotipo = leerLogotipo();
    $pdf = subirPdf();
    if ($logotipo == "" || $pdf == "") {
        echo "Hay que subir el logotipo y el pdf. <a href='javascript:history.back()'>Volver</a>";
        return;
    }

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "insert into proyectos(titulo, descripcion, periodo, curso, fecha_presentacion, nota, logotipo, pdf_proyecto, alumno, tutor) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    // s = texto, d = decimal, i = entero
    mysqli_stmt_bind_param($consulta, "sssssdssii", $titulo, $descripcion, $periodo, $curso, $fecha, $nota, $logotipo, $pdf, $alumno, $tutor);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_proyecto.php");
    } else {
        echo "Error al insertar el proyecto";
    }
}

// ---------- READ ----------
// devuelve un array con todos los proyectos y el nombre completo de su alumno y de su tutor (consulta con join)
function listarProyecto()
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select p.id_proyecto, p.titulo, p.descripcion, p.periodo, p.curso, p.fecha_presentacion, p.nota, p.logotipo, p.pdf_proyecto, p.alumno, p.tutor, concat(a.nombre, ' ', a.apellido1, ' ', a.apellido2), concat(t.nombre, ' ', t.apellido1, ' ', t.apellido2) from proyectos p left outer join alumnos a on p.alumno = a.id_alumno left outer join tutores t on p.tutor = t.id_tutor");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idProyecto, $titulo, $descripcion, $periodo, $curso, $fecha, $nota, $logotipo, $pdf, $idAlumno, $idTutor, $nombreAlumno, $nombreTutor);

    $proyectos = array();
    while (mysqli_stmt_fetch($consulta)) {
        $proyectos[] = array("id_proyecto" => $idProyecto, "titulo" => $titulo, "descripcion" => $descripcion, "periodo" => $periodo, "curso" => $curso, "fecha_presentacion" => $fecha, "nota" => $nota, "logotipo" => $logotipo, "pdf_proyecto" => $pdf, "alumno" => $idAlumno, "tutor" => $idTutor, "nombre_alumno" => $nombreAlumno, "nombre_tutor" => $nombreTutor);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $proyectos;
}

// devuelve un solo proyecto (array) a partir de su id
function listarProyectoId($id)
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select id_proyecto, titulo, descripcion, periodo, curso, fecha_presentacion, nota, logotipo, pdf_proyecto, alumno, tutor from proyectos where id_proyecto = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $id);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $idProyecto, $titulo, $descripcion, $periodo, $curso, $fecha, $nota, $logotipo, $pdf, $idAlumno, $idTutor);

    $proyecto = null;
    if (mysqli_stmt_fetch($consulta)) {
        $proyecto = array("id_proyecto" => $idProyecto, "titulo" => $titulo, "descripcion" => $descripcion, "periodo" => $periodo, "curso" => $curso, "fecha_presentacion" => $fecha, "nota" => $nota, "logotipo" => $logotipo, "pdf_proyecto" => $pdf, "alumno" => $idAlumno, "tutor" => $idTutor);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $proyecto;
}

// ---------- UPDATE ----------
function modificarProyecto()
{
    // recoge los datos del formulario (incluido el id oculto)
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $periodo = $_POST["periodo"];
    $curso = $_POST["curso"];
    $fecha = $_POST["fecha_presentacion"];
    $alumno = $_POST["alumno"];
    $tutor = $_POST["tutor"];

    $nota = null;
    if ($_POST["nota"] != "") {
        $nota = $_POST["nota"];
    }

    // si no se sube un fichero nuevo, se mantiene el que ya tiene el proyecto
    $actual = listarProyectoId($id);
    $logotipo = leerLogotipo();
    if ($logotipo == "") {
        $logotipo = $actual["logotipo"];
    }
    $pdf = subirPdf();
    if ($pdf == "") {
        $pdf = $actual["pdf_proyecto"];
    }

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "update proyectos set titulo = ?, descripcion = ?, periodo = ?, curso = ?, fecha_presentacion = ?, nota = ?, logotipo = ?, pdf_proyecto = ?, alumno = ?, tutor = ? where id_proyecto = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "sssssdssiii", $titulo, $descripcion, $periodo, $curso, $fecha, $nota, $logotipo, $pdf, $alumno, $tutor, $id);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_proyecto.php");
    } else {
        echo "Error al modificar el proyecto";
    }
}

// ---------- DELETE ----------
function eliminarProyecto()
{
    // recoge el id enviado por POST
    $id = $_POST["id"];

    $canal = conexion();
    $consulta = mysqli_prepare($canal, "delete from proyectos where id_proyecto = ?");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $id);
    $correcto = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    mysqli_close($canal);

    if ($correcto) {
        header("Location: ../vista/lista_proyecto.php");
    } else {
        echo "Error al eliminar el proyecto";
    }
}

// ---------- QUÉ FUNCIÓN EJECUTAR ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"])) {
        switch ($_POST["accion"]) {
            case "crear":
                insertProyecto();
                break;
            case "modificar":
                modificarProyecto();
                break;
            case "eliminar":
                eliminarProyecto();
                break;
            default:
                header('Location: ../vista/lista_proyecto.php');
                exit;
        }
    }
}
