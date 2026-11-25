<?php
include "../controller/proyectoController.php";

// array con todos los proyectos y el nombre de su alumno y de su tutor
$proyectos = listarProyecto();

include "encabezado.php";
?>

<a href="../vista/form_proyecto_insert.php">Agregar</a>

<table border="1">
    <tr>
        <th>Título</th>
        <th>Alumno</th>
        <th>Tutor</th>
        <th>Periodo</th>
        <th>Curso</th>
        <th>Fecha de presentación</th>
        <th>Nota</th>
        <th>Logotipo</th>
        <th>PDF</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach ($proyectos as $proyecto) { ?>
    <tr>
        <td><?= htmlspecialchars($proyecto["titulo"]) ?></td>
        <td><?= htmlspecialchars($proyecto["nombre_alumno"]) ?></td>
        <td><?= htmlspecialchars($proyecto["nombre_tutor"]) ?></td>
        <td><?= $proyecto["periodo"] ?></td>
        <td><?= htmlspecialchars($proyecto["curso"]) ?></td>
        <td><?= $proyecto["fecha_presentacion"] ?></td>
        <td><?= $proyecto["nota"] ?></td>
        <td><img src="<?= imagenDatos($proyecto["logotipo"]) ?>" alt="logotipo" width="50"></td>
        <!-- enlace a la ruta completa del pdf -->
        <td><a href="<?= urlPdf($proyecto["pdf_proyecto"]) ?>" target="_blank">Ver PDF</a></td>
        <td><a href="../vista/form_proyecto_modificar.php?id=<?= $proyecto["id_proyecto"] ?>">Modificar</a></td>
        <td>
            <form action="../controller/proyectoController.php" method="POST">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?= $proyecto["id_proyecto"] ?>">
                <input type="submit" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include "pie.php"; ?>
