<?php
include_once "../config/conexion.php";

// alumno vacío: sirve para "Agregar"
$alumno = array("id_alumno" => "", "dni" => "", "nombre" => "", "apellido1" => "", "apellido2" => "", "email" => "", "telefono" => "", "ciclo" => "");

// si llega un id por la url es "Modificar": se cargan los datos de ese alumno
if (isset($_GET["id"])) {
    try {
        $conexion = conexion();
        $sentencia = $conexion->prepare("select * from alumnos where id_alumno = :id");
        $sentencia->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
        $sentencia->execute();
        $alumno = $sentencia->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Falló la conexión: " . $e->getMessage();
    }
}

include "encabezado.php";
?>

<form action="../controlador/guardar.php" method="post">
    <!-- vacío si es un alumno nuevo -->
    <input type="hidden" name="id_alumno" value="<?= $alumno["id_alumno"] ?>">

    DNI: <input type="text" name="dni" value="<?= $alumno["dni"] ?>" required><br>
    Nombre: <input type="text" name="nombre" value="<?= $alumno["nombre"] ?>" required><br>
    Primer apellido: <input type="text" name="apellido1" value="<?= $alumno["apellido1"] ?>" required><br>
    Segundo apellido: <input type="text" name="apellido2" value="<?= $alumno["apellido2"] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $alumno["email"] ?>" required><br>
    Teléfono: <input type="text" name="telefono" value="<?= $alumno["telefono"] ?>" required><br>
    Ciclo: <input type="text" name="ciclo" value="<?= $alumno["ciclo"] ?>" required><br>

    <input type="submit" value="Guardar">
</form>

<?php include "pie.php"; ?>