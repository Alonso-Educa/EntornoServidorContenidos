<?php

$mensaje = strip_tags($_GET["mensaje"] ?? "");
$isbn = strip_tags($_GET["isbn"] ?? "");
$titulo = strip_tags($_GET["titulo"] ?? "");
$autor = strip_tags($_GET["autor"] ?? "");
$tematica = strip_tags($_GET["tematica"] ?? "");
$fecha = strip_tags($_GET["fecha"] ?? "");
$n_paginas = strip_tags($_GET["n_paginas"] ?? "");
$posicion = strip_tags($_GET["posicion"] ?? "");
$ejemplar = strip_tags($_GET["ejemplar"] ?? "");
$prestado = strip_tags($_GET["prestado"] ?? "");

function elegido($valorElegido, $opcionElegible)
{
    if ($valorElegido == $opcionElegible) {
        return 'checked="checked"';
    }
    return "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if ($mensaje !== "") {
        echo "<p style='color: red;''><?= $mensaje ?></p>";
    } ?>

    <form action="ej3datos.php" method="post">

        <input type="hidden" id="tipo" name="tipo" value="libro">
        <label for="isbn">ISBN: </label>
        <input type="text" id="isbn" name="isbn" maxlength="8" value="<?= $isbn ?>" required><br>

        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" value="<?= $titulo ?>" maxlength="255" required><br>

        <label for="autor">Autor: </label>
        <input type="text" id="autor" name="autor" value="<?= $autor ?>" maxlength="50" required><br>

        <label for="tematica">Temática: </label>
        <input type="text" id="tematica" name="tematica" value="<?= $tematica ?>" maxlength="11" required><br>

        <label for="fecha">Fecha de publicación: </label>
        <input type="date" id="fecha" name="fecha" value="<?= $fecha ?>" required><br>

        <label for="n_paginas">Número de páginas: </label>
        <input type="number" id="n_paginas" name="n_paginas" value="<?= $n_paginas ?>" min="0" max="99999" required><br>

        <label for="posicion">Posición: </label>
        <input type="text" id="posicion" name="posicion" value="<?= $posicion ?>" maxlength="255" required><br>

        <label for="ejemplar">Ejemplar: </label>
        <input type="text" id="ejemplar" name="ejemplar" maxlength="5" value="<?= $ejemplar ?>" required><br>

        <label>Prestado: </label>
        <input type="radio" id="presv" name="prestado" value="1" <?= elegido($prestado, "1") ?> required>
        <label for="presv">Prestado </label>
        <input type="radio" id="presf" name="prestado" value="0" <?= elegido($prestado, "0") ?>>
        <label for="presf">Sin prestar</label><br>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>