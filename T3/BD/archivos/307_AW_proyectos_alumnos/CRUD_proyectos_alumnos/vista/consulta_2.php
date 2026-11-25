<?php
include "../controller/repository.php";

// ciclos que hay en la base de datos, para el desplegable
$ciclos = listarCiclos();

// si se ha enviado el formulario, se buscan los proyectos de ese ciclo
$ciclo = "";
$proyectos = array();
if (isset($_GET["ciclo"]) && $_GET["ciclo"] != "") {
    $ciclo = $_GET["ciclo"];
    $proyectos = consulta2($ciclo);
}

include "encabezado.php";
?>

<h2>Consulta 2: de un ciclo seleccionado, muestra los proyectos</h2>

<form action="consulta_2.php" method="GET">
    Selecciona el ciclo:
    <select name="ciclo" required>
        <option value="">-- Selecciona un ciclo --</option>
        <?php foreach ($ciclos as $opcion) { ?>
            <option value="<?= htmlspecialchars($opcion) ?>" <?= $opcion == $ciclo ? "selected" : "" ?>><?= htmlspecialchars($opcion) ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Buscar Proyectos">
</form>

<?php if ($ciclo != "") { ?>
    <h3>Proyectos del ciclo: <?= htmlspecialchars($ciclo) ?></h3>
    <p>Total de proyectos: <?= count($proyectos) ?></p>

    <table border="1">
        <tr>
            <th>Proyecto</th>
            <th>Descripción</th>
            <th>Curso</th>
            <th>Periodo</th>
            <th>Fecha Presentación</th>
            <th>Nota</th>
            <th>Alumno</th>
        </tr>
        <?php foreach ($proyectos as $proyecto) { ?>
        <tr>
            <td><?= htmlspecialchars($proyecto["titulo"]) ?></td>
            <td><?= htmlspecialchars($proyecto["descripcion"]) ?></td>
            <td><?= htmlspecialchars($proyecto["curso"]) ?></td>
            <td><?= $proyecto["periodo"] ?></td>
            <td><?= $proyecto["fecha_presentacion"] ?></td>
            <td><?= $proyecto["nota"] ?></td>
            <td><?= htmlspecialchars($proyecto["alumno"]) ?></td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php include "pie.php"; ?>
