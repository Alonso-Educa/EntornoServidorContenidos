<?php
include "../controller/alumnoController.php";

// array con todos los alumnos
$alumnos = listarAlumno();

include "encabezado.php";
?>

<a href="../vista/form_alumno_insert.php">Agregar</a>

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
        <td><?= htmlspecialchars($alumno["dni"]) ?></td>
        <td><?= htmlspecialchars($alumno["nombre"]) ?></td>
        <td><?= htmlspecialchars($alumno["apellido1"] . " " . $alumno["apellido2"]) ?></td>
        <td><?= htmlspecialchars($alumno["telefono"]) ?></td>
        <td><?= htmlspecialchars($alumno["email"]) ?></td>
        <!-- el id viaja por la URL hasta el formulario de modificar -->
        <td><a href="../vista/form_alumno_modificar.php?id=<?= $alumno["id_alumno"] ?>">Modificar</a></td>
        <td>
            <!-- el id viaja por POST al controlador para eliminar -->
            <form action="../controller/alumnoController.php" method="POST">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?= $alumno["id_alumno"] ?>">
                <input type="submit" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include "pie.php"; ?>
