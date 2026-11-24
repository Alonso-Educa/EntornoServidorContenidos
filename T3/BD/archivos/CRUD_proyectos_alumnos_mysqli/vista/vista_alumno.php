<?php
include "../controlador/alumnoController.php";

// array con todos los alumnos
$alumnos = listarAlumno();

include "encabezado.php";
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
            <td>
                <!-- envía el id por POST al formulario de modificar -->
                <form action="form_alumno_modificar.php" method="post">
                    <input type="hidden" name="id_alumno" value="<?= $alumno["id_alumno"] ?>">
                    <input type="submit" value="Modificar">
                </form>
            </td>
            <td>
                <!-- envía el id por POST al controlador para eliminar -->
                <form action="../controlador/alumnoController.php" method="post">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="hidden" name="id_alumno" value="<?= $alumno["id_alumno"] ?>">
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- CREATE: lleva al formulario vacío -->
<form action="form_alumno_insert.php" method="get">
    <br>
    <button type="submit">Agregar</button>
</form>

<?php include "pie.php"; ?>