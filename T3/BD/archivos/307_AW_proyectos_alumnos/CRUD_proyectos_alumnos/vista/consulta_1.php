<?php
include "../controller/repository.php";

// cursos que hay en la base de datos, para el desplegable
$cursos = listarCursos();

// si se ha enviado el formulario, se buscan los proyectos de ese curso
$curso = "";
$proyectos = array();
if (isset($_GET["curso"]) && $_GET["curso"] != "") {
    $curso = $_GET["curso"];
    $proyectos = consulta1($curso);
}

include "encabezado.php";
?>

<h2>Consulta 1: de un curso seleccionado, muestra listado de alumnos y sus proyectos</h2>

<form action="consulta_1.php" method="GET">
    Selecciona el curso:
    <select name="curso" required>
        <option value="">-- Selecciona un curso --</option>
        <?php foreach ($cursos as $opcion) { ?>
            <option value="<?= htmlspecialchars($opcion) ?>" <?= $opcion == $curso ? "selected" : "" ?>><?= htmlspecialchars($opcion) ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Buscar Proyectos">
</form>

<?php if ($curso != "") { ?>
    <h3>Proyectos del curso: <?= htmlspecialchars($curso) ?></h3>
    <p>Total de proyectos: <?= count($proyectos) ?></p>

    <table border="1">
        <tr>
            <th>Alumno</th>
            <th>Ciclo</th>
            <th>Proyecto</th>
            <th>Descripción</th>
            <th>Periodo</th>
            <th>Fecha Presentación</th>
            <th>Nota</th>
        </tr>
        <?php foreach ($proyectos as $proyecto) { ?>
        <tr>
            <td><?= htmlspecialchars($proyecto["alumno"]) ?></td>
            <td><?= htmlspecialchars($proyecto["ciclo"]) ?></td>
            <td><?= htmlspecialchars($proyecto["titulo"]) ?></td>
            <td><?= htmlspecialchars($proyecto["descripcion"]) ?></td>
            <td><?= $proyecto["periodo"] ?></td>
            <td><?= $proyecto["fecha_presentacion"] ?></td>
            <td><?= $proyecto["nota"] ?></td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php include "pie.php"; ?>
