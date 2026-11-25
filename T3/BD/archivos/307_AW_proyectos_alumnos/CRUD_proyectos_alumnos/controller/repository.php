<?php
include_once "../config/conexion.php";

// Consultas preparadas que usan las páginas consulta_1.php ... consulta_5.php
// Todas siguen el mismo patrón: conexión -> prepare -> bind_param (si hay ?) -> execute -> bind_result -> fetch -> close

// ---------- DATOS PARA LOS DESPLEGABLES ----------

// devuelve un array con los cursos que hay en la tabla proyectos (sin repetir)
function listarCursos()
{
    $canal = conexion();
    // distinct evita que un curso salga repetido
    $consulta = mysqli_prepare($canal, "select distinct curso from proyectos order by curso desc");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $curso);

    $cursos = array();
    while (mysqli_stmt_fetch($consulta)) {
        $cursos[] = $curso;
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $cursos;
}

// devuelve un array con los ciclos que hay en la tabla alumnos (sin repetir)
function listarCiclos()
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select distinct ciclo from alumnos order by ciclo");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $ciclo);

    $ciclos = array();
    while (mysqli_stmt_fetch($consulta)) {
        $ciclos[] = $ciclo;
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $ciclos;
}

// ---------- CONSULTA 1 ----------
// de un curso: alumnos y sus proyectos, ordenados por ciclo, periodo y fecha
function consulta1($curso)
{
    $canal = conexion();
    // concat une varias columnas en una sola (aquí, el nombre completo del alumno)
    $consulta = mysqli_prepare($canal, "select concat(a.nombre, ' ', a.apellido1, ' ', a.apellido2), a.ciclo, p.titulo, p.descripcion, p.periodo, p.fecha_presentacion, p.nota from proyectos p join alumnos a on p.alumno = a.id_alumno where p.curso = ? order by a.ciclo, p.periodo, p.fecha_presentacion");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "s", $curso);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $alumno, $ciclo, $titulo, $descripcion, $periodo, $fecha, $nota);

    $filas = array();
    while (mysqli_stmt_fetch($consulta)) {
        $filas[] = array("alumno" => $alumno, "ciclo" => $ciclo, "titulo" => $titulo, "descripcion" => $descripcion, "periodo" => $periodo, "fecha_presentacion" => $fecha, "nota" => $nota);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $filas;
}

// ---------- CONSULTA 2 ----------
// de un ciclo: todos sus proyectos ordenados en el tiempo
function consulta2($ciclo)
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select p.titulo, p.descripcion, p.curso, p.periodo, p.fecha_presentacion, p.nota, concat(a.nombre, ' ', a.apellido1, ' ', a.apellido2) from proyectos p join alumnos a on p.alumno = a.id_alumno where a.ciclo = ? order by p.fecha_presentacion");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "s", $ciclo);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $titulo, $descripcion, $curso, $periodo, $fecha, $nota, $alumno);

    $filas = array();
    while (mysqli_stmt_fetch($consulta)) {
        $filas[] = array("titulo" => $titulo, "descripcion" => $descripcion, "curso" => $curso, "periodo" => $periodo, "fecha_presentacion" => $fecha, "nota" => $nota, "alumno" => $alumno);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $filas;
}

// ---------- CONSULTA 3 ----------
// de un tutor (por su id): todos sus proyectos ordenados en el tiempo
function consulta3($idTutor)
{
    $canal = conexion();
    $consulta = mysqli_prepare($canal, "select p.titulo, p.descripcion, concat(a.nombre, ' ', a.apellido1, ' ', a.apellido2), p.curso, p.periodo, p.fecha_presentacion, p.nota from proyectos p join alumnos a on p.alumno = a.id_alumno where p.tutor = ? order by p.fecha_presentacion");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "i", $idTutor);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $titulo, $descripcion, $alumno, $curso, $periodo, $fecha, $nota);

    $filas = array();
    while (mysqli_stmt_fetch($consulta)) {
        $filas[] = array("titulo" => $titulo, "descripcion" => $descripcion, "alumno" => $alumno, "curso" => $curso, "periodo" => $periodo, "fecha_presentacion" => $fecha, "nota" => $nota);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $filas;
}

// ---------- CONSULTA 4 ----------
// de un curso: proyectos con la información completa del alumno y del tutor, ordenados por ciclo y fecha
function consulta4($curso)
{
    $canal = conexion();
    // dos join: uno con alumnos y otro con tutores
    $consulta = mysqli_prepare($canal, "select p.titulo, p.periodo, p.fecha_presentacion, concat(a.nombre, ' ', a.apellido1, ' ', a.apellido2), a.email, a.ciclo, concat(t.nombre, ' ', t.apellido1, ' ', t.apellido2), t.email from proyectos p join alumnos a on p.alumno = a.id_alumno join tutores t on p.tutor = t.id_tutor where p.curso = ? order by a.ciclo, p.fecha_presentacion");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_bind_param($consulta, "s", $curso);
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $titulo, $periodo, $fecha, $alumno, $emailAlumno, $ciclo, $tutor, $emailTutor);

    $filas = array();
    while (mysqli_stmt_fetch($consulta)) {
        $filas[] = array("titulo" => $titulo, "periodo" => $periodo, "fecha_presentacion" => $fecha, "alumno" => $alumno, "email_alumno" => $emailAlumno, "ciclo" => $ciclo, "tutor" => $tutor, "email_tutor" => $emailTutor);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $filas;
}

// ---------- CONSULTA 5 (inventada) ----------
// número de proyectos y nota media de cada tutor (los tutores sin proyectos salen con 0)
function consulta5()
{
    $canal = conexion();
    // count y avg son funciones de agrupación: calculan un dato por cada grupo (group by)
    $consulta = mysqli_prepare($canal, "select concat(t.nombre, ' ', t.apellido1, ' ', t.apellido2), count(p.id_proyecto), avg(p.nota) from tutores t left outer join proyectos p on p.tutor = t.id_tutor where t.eliminado = 0 group by t.id_tutor, t.nombre, t.apellido1, t.apellido2 order by avg(p.nota) desc");
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $tutor, $total, $media);

    $filas = array();
    while (mysqli_stmt_fetch($consulta)) {
        $filas[] = array("tutor" => $tutor, "total" => $total, "media" => $media);
    }

    mysqli_stmt_close($consulta);
    mysqli_close($canal);
    return $filas;
}
