<?php
include_once "../config/conexion.php";

try {
    $conexion = conexion();

    // datos que llegan del formulario
    $datos = array(
        ":dni" => $_POST["dni"],
        ":nombre" => $_POST["nombre"],
        ":apellido1" => $_POST["apellido1"],
        ":apellido2" => $_POST["apellido2"],
        ":email" => $_POST["email"],
        ":telefono" => $_POST["telefono"],
        ":ciclo" => $_POST["ciclo"]
    );

    if ($_POST["id_alumno"] == "") {
        // sin id: alumno nuevo (CREATE)
        $sql = "insert into alumnos(dni, nombre, apellido1, apellido2, email, telefono, ciclo) values(:dni, :nombre, :apellido1, :apellido2, :email, :telefono, :ciclo)";
    } else {
        // con id: alumno existente (UPDATE)
        $sql = "update alumnos set dni = :dni, nombre = :nombre, apellido1 = :apellido1, apellido2 = :apellido2, email = :email, telefono = :telefono, ciclo = :ciclo where id_alumno = :id_alumno";
        $datos[":id_alumno"] = $_POST["id_alumno"];
    }

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute($datos);

    // volver al listado, que se muestra actualizado
    header("Location: ../public/index.php");

} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}

?>