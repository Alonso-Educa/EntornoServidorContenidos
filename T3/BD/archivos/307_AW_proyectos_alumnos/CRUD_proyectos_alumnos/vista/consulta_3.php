<?php
include "../controller/repository.php";
include "../controller/tutorController.php";

// tutores para el desplegable (se reutiliza la función del CRUD de tutor)
$tutores = listarTutor();

// si se ha enviado el formulario, se buscan los proyectos de ese tutor
$idTutor = "";
$nombreTutor = "";
$proyectos = array();
if (isset($_GET["tutor"]) && $_GET["tutor"] != "") {
    $idTutor = $_GET["tutor"];
    $proyectos = consulta3($idTutor);

    // nombre del tutor seleccionado, para el título
    foreach ($tutores as $tutor) {
        if ($tutor["id_tutor"] == $idTutor) {
            $nombreTutor = $tutor["nombre"] . " " . $tutor["apellido1"] . " " . $tutor["apellido2"];
        }
    }
}

include "encabezado.php";
?>

<h2>Consulta 3: de un tutor seleccionado, muestra sus proyectos</h2>

<form action="consulta_3.php" method="GET">
    Selecciona el tutor:
    <select name="tutor" required>
        <option value="">-- Selecciona un tutor --</option>
        <?php foreach ($tutores as $tutor) { ?>
            <option value="<?= $tutor["id_tutor"] ?>" <?= $tutor["id_tutor"] == $idTutor ? "selected" : "" ?>>
                <?= htmlspecialchars($tutor["nombre"] . " " . $tutor["apellido1"] . " " . $tutor["apellido2"]) ?>
            </option>
        <?php } ?>
    </select>
    <input type="submit" value="Buscar Proyectos">
</form>

<?php if ($idTutor != "") { ?>
    <h3>Proyectos del tutor: <?= htmlspecialchars($nombreTutor) ?></h3>
    <p>Total de proyectos: <?= count($proyectos) ?></p>

    <table border="1">
        <tr>
            <th>Proyecto</th>
            <th>Descripción</th>
            <th>Alumno</th>
            <th>Curso</th>
            <th>Periodo</th>
            <th>Fecha Presentación</th>
            <th>Nota</th>
        </tr>
        <?php foreach ($proyectos as $proyecto) { ?>
        <tr>
            <td><?= htmlspecialchars($proyecto["titulo"]) ?></td>
            <td><?= htmlspecialchars($proyecto["descripcion"]) ?></td>
            <td><?= htmlspecialchars($proyecto["alumno"]) ?></td>
            <td><?= htmlspecialchars($proyecto["curso"]) ?></td>
            <td><?= $proyecto["periodo"] ?></td>
            <td><?= $proyecto["fecha_presentacion"] ?></td>
            <td><?= $proyecto["nota"] ?></td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php include "pie.php"; ?>
