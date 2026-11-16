<?php

$mensaje = strip_tags($_GET["mensaje"] ?? "");
$posicion = strip_tags($_GET["posicion"] ?? "");
$planta = strip_tags($_GET["planta"] ?? "");
$seccion = strip_tags($_GET["seccion"] ?? "");
$estanteria = strip_tags($_GET["estanteria"] ?? "");
$descripcion = strip_tags($_GET["descripcion"] ?? "");

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

        <input type="hidden" id="tipo" name="tipo" value="ordenacion">

        <label for="posicion">Posición: </label>
        <input type="text" id="posicion" name="posicion" maxlength="8" value="<?= $posicion ?>" required><br>

        <label for="planta">Planta: </label>
        <input type="number" id="planta" name="planta" min="0" max="999" value="<?= $planta ?>" required><br>

        <label for="seccion">Sección: </label>
        <input type="number" id="seccion" name="seccion" min="0" max="999" value="<?= $seccion ?>" required><br>

        <label for="estanteria">Estantería: </label>
        <input type="number" id="estanteria" name="estanteria" min="0" max="999" value="<?= $estanteria ?>" required><br>

        <label for="descripcion">Descripción: </label>
        <input type="text" id="descripcion" name="descripcion" maxlength="255" value="<?= $descripcion ?>" required><br>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>