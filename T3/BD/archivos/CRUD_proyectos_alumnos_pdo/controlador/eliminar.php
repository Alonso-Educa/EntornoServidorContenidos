<?php
include_once "../config/conexion.php";

// DELETE
try {
    $conexion = conexion();
    $sentencia = $conexion->prepare("delete from alumnos where id_alumno = :id");
    $sentencia->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
    $sentencia->execute();

    // volver al listado, que se muestra actualizado
    header("Location: ../public/index.php");

} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}

?>