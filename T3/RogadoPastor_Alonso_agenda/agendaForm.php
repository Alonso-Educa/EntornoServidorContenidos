<?php

// leer datos
// agenda es una matriz bidimensional pasada como texto
$agenda = $_GET["agenda"] ?? "";
$nom = $_GET["nom"] ?? "";
$tel = $_GET["tel"] ?? "";
$errorNom = $_GET["errorNom"] ?? "";
$errorTel = $_GET["errorTel"] ?? "";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 3</title>
</head>

<body>
    <textarea disabled>
        <?php
        if ($agenda != []) {
            $agendaNuevo = explode(",", $agenda);
            foreach ($agendaNuevo as $dato) {
                $datos = explode("-", $dato);
                echo $datos[0] . " - " . $datos[1] . "<br>";
            }
        }

        ?>
    </textarea>

    <!-- <form action="leerAgenda.php" method="post"> -->
    <form action="leerAgenda.php" method="post">
        <input type="hidden" name="agenda" value="<?php echo $agenda; ?>">
        <label for="nom">Nombre: </label>
        <input type="text" name="nom" id="nom" value="<?php if ($nom != "") {
            echo $nom;
        } ?>">
        <?php if ($errorNom != "") {
            echo "<p style='color='red'>" . $errorNom . "</p>";
        }
        ?>
        <label for="tel">Telefono:</label>
        <input type="number" id="tel" name="tel" value="<?php if ($tel != "") {
            echo $tel;
        } ?>">
        <?php if ($errorTel != "") {
            echo "<p style='color='red'>" . $errorTel . "</p>";
        }
        ?>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>