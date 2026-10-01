<?php
$alturas = ["Alonso" => 1.65, "Mauro" => 1.80, "Juan" => 1.72, "Juana" => 1.78, "Daniel" => 1.60];
?>
<!DOCTYPE html>

<head>
    <title>Informacion de alturas</title>
</head>

<body>
    <h1>Informacion de alturas</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Altura</th>
        </tr>
        <?php foreach ($alturas as $nombre => $altura): ?>
            <tr>
                <td><?= $nombre ?></td>
                <td><?= $altura ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Media</th>
            <th><?= array_sum($alturas) / count($alturas) ?></th>
        </tr>
    </table>
</body>

</html>