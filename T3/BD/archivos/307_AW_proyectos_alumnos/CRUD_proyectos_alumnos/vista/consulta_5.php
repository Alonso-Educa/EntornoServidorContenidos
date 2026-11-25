<?php
include "../controller/repository.php";

// esta consulta no necesita formulario: se muestra directamente
$tutores = consulta5();

include "encabezado.php";
?>

<h2>Consulta 5: número de proyectos y nota media de cada tutor</h2>

<p>Total de tutores: <?= count($tutores) ?></p>

<table border="1">
    <tr>
        <th>Tutor</th>
        <th>Nº de proyectos</th>
        <th>Nota media</th>
    </tr>
    <?php foreach ($tutores as $tutor) { ?>
    <tr>
        <td><?= htmlspecialchars($tutor["tutor"]) ?></td>
        <td><?= $tutor["total"] ?></td>
        <!-- si ningún proyecto tiene nota, la media es NULL -->
        <td><?= $tutor["media"] === null ? "sin notas" : round($tutor["media"], 2) ?></td>
    </tr>
    <?php } ?>
</table>

<?php include "pie.php"; ?>
