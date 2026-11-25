<?php
include "../controller/repository.php";

// cursos que hay en la base de datos, para el desplegable
$cursos = listarCursos();

// si se ha enviado el formulario, se buscan los proyectos de ese curso
$curso = "";
$proyectos = array();
if (isset($_GET["curso"]) && $_GET["curso"] != "") {
    $curso = $_GET["curso"];
    $proyectos = consulta4($curso);
}

include "encabezado.php";
?>

<h2>Consulta 4: de un curso seleccionado, muestra los proyectos con información completa</h2>

<form action="consulta_4.php" method="GET">
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
            <th>Título</th>
            <th>Periodo</th>
            <th>Fecha Presentación</th>
            <th>Alumno</th>
            <th>Email del alumno</th>
            <th>Ciclo</th>
            <th>Tutor</th>
            <th>Email del tutor</th>
        </tr>
        <?php foreach ($proyectos as $proyecto) { ?>
        <tr>
            <td><?= htmlspecialchars($proyecto["titulo"]) ?></td>
            <td><?= $proyecto["periodo"] ?></td>
            <td><?= $proyecto["fecha_presentacion"] ?></td>
            <td><?= htmlspecialchars($proyecto["alumno"]) ?></td>
            <td><?= htmlspecialchars($proyecto["email_alumno"]) ?></td>
            <td><?= htmlspecialchars($proyecto["ciclo"]) ?></td>
            <td><?= htmlspecialchars($proyecto["tutor"]) ?></td>
            <td><?= htmlspecialchars($proyecto["email_tutor"]) ?></td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php include "pie.php"; ?>
