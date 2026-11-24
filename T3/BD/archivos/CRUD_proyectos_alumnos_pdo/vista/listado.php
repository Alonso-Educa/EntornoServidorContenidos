<?php
// READ: leer todos los alumnos (misma idea que "leer por matriz")
$alumnos = [];
try {
    $conexion = conexion();
    $sentencia = $conexion->prepare("select * from alumnos");
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute();
    $alumnos = $sentencia->fetchAll();
} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}
?>



<table border="1">
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach ($alumnos as $alumno) { ?>
        <tr>
            <td><?= $alumno["dni"] ?></td>
            <td><?= $alumno["nombre"] ?></td>
            <td><?= $alumno["apellido1"] . " " . $alumno["apellido2"] ?></td>
            <td><?= $alumno["telefono"] ?></td>
            <td><?= $alumno["email"] ?></td>
            <!-- UPDATE: lleva al formulario con los datos del alumno -->
            <td><a href="../vista/formulario.php?id=<?= $alumno["id_alumno"] ?>">Modificar</a></td>
            <!-- DELETE -->
            <td><a href="../controlador/eliminar.php?id=<?= $alumno["id_alumno"] ?>">Eliminar</a></td>
        </tr>
    <?php } ?>
</table>

<!-- CREATE: lleva al formulario vacío -->
<form action="../vista/formulario.php" method="get">
    <br>
    <button type="submit">Agregar</button>
</form>