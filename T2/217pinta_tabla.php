<?php
// Valor por defecto
$filas = 5;
$columnas = 5;

// Se leen las filas desde ?filas=n
$f = filter_input(INPUT_GET, 'filas', FILTER_VALIDATE_INT);
if ($f !== null && $f !== false) {
    $filas = $f;
}

// Se leen las columnas desde ?columnas=n
$c = filter_input(INPUT_GET, 'columnas', FILTER_VALIDATE_INT);
if ($c !== null && $c !== false) {
    $columnas = $c;
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Tabla con dimensiones <?= $filas + $columnas ?></title>
</head>

<body>
    <h1>Tabla con dimensiones <?= $filas ?> * <?= $columnas ?></h1>

    <table border="1">
        <tbody>
            <?php for ($i = 0; $i < $filas; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < $columnas; $j++): ?>
                        <td><?= $i ?> , <?= $j ?></td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>

    </table>
</body>

</html>