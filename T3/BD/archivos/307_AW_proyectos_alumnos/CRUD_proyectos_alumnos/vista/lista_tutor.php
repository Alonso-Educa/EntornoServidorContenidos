<?php
include "../controller/tutorController.php";

// array con todos los tutores (los eliminados no aparecen)
$tutores = listarTutor();

include "encabezado.php";
?>

<a href="../vista/form_tutor_insert.php">Agregar</a>

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
    <?php foreach ($tutores as $tutor) { ?>
    <tr>
        <td><?= htmlspecialchars($tutor["dni"]) ?></td>
        <td><?= htmlspecialchars($tutor["nombre"]) ?></td>
        <td><?= htmlspecialchars($tutor["apellido1"] . " " . $tutor["apellido2"]) ?></td>
        <td><?= htmlspecialchars($tutor["telefono"]) ?></td>
        <td><?= htmlspecialchars($tutor["email"]) ?></td>
        <td><a href="../vista/form_tutor_modificar.php?id=<?= $tutor["id_tutor"] ?>">Modificar</a></td>
        <td>
            <form action="../controller/tutorController.php" method="POST">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?= $tutor["id_tutor"] ?>">
                <input type="submit" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include "pie.php"; ?>
