<?php
$alturas = ["Alonso" => 1.65, "Mauro" => 1.80, "Juan" => 1.72, "Juana" => 1.78, "Daniel" => 1.60];
$media = array_sum($alturas) / count($alturas);
$nombre = $_GET['nombre'] ?? '';
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Informacion de alturas</title>
</head>

<body>
    <h1>Media de alturas</h1>
    <p>Media: <?= $media ?></p>
    <?php if (isset($alturas[$nombre])): ?>
        <p><?= $nombre ?> mide <?= $alturas[$nombre] ?>,
            <?= $alturas[$nombre] > $media ? "por encima" : "por debajo" ?> de la media.
        </p>
    <?php else: ?>
        <p>Nombre no encontrado.</p>
    <?php endif; ?>
</body>

</html>