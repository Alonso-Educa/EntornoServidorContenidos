<?php
// Valor por defecto
$n = 10;

// Se lee el numero desde ?n=x
$recibido = filter_input(INPUT_GET, 'n', FILTER_VALIDATE_INT);
if ($recibido !== null && $recibido !== false) {
    $n = $recibido;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla del <?= $n ?></title>
</head>
<body>
    <h1>Tabla de multiplicar del <?= $n ?></h1>

    <table border="1">
        <thead>
            <tr>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <tr>
                    <td><?= $n ?> * <?= $i ?></td>
                    <td><?= $n * $i ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>
</html>