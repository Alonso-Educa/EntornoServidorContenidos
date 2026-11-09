<?php

// leer datos
$nom = strip_tags($_GET["nom"]) ?? "";
$tel = strip_tags($_GET["tel"]) ?? "";
$errorNom = strip_tags($_GET["errorNom"]) ?? "";
$errorTel = strip_tags($_GET["errorTel"]) ?? "";
$mensaje = strip_tags($_GET["mensaje"]) ?? "";

// agenda es un array asociativo pasado con pares clave-valor: nombre => telefono
$agenda = strip_tags($_GET["agenda"]) ?? [];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica de examen: Agenda</title>
</head>

<body>
    <textarea disabled>
        <?php

        if ($agenda != []) {
            foreach ($agenda as $nombre => $tel) {
                echo $nombre . " - " . $tel . "<br>";
            }
        }

        ?>
    </textarea>

    <form action="leerAgenda.php" method="post">
        <input type="hidden" name="agenda" value="<?= $agenda ?>">

        <label for="nom">Nombre: </label>
        <input type="text" name="nom" id="nom" value="<?= $nom ?>">
        <?php
        if ($errorNom != "") {
            echo "<span style='color: red;'>" . $errorNom . "</span>";
        }
        ?>

        <label for="tel">Telefono:</label>
        <input type="number" id="tel" name="tel" value="<?= $tel ?>" maxlength="9">
        <?php 
        if ($errorTel != "") {
            echo "<span style='color: red;'>" . $errorTel . "</span>";
        }
        ?>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>