<?php

// procesa solo se ejecuta cuando llegan datos por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function filtrado($datos)
    {
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    $correcto = "v";
    $agenda = $_POST["agenda"] ?? [];

    $errorNom = "";
    $nom = "";
    // valida que el nombre exista y no esté vacío
    if (empty($_POST["nom"])) {
        $correcto = "f";
        $errorNom = "El nombre no puede estar vacio";
    } else {
        $nom = filtrado($_POST["nom"]);
    }

    $errorTel = "";
    $tel = "";
    if (!empty($_POST["tel"])) {
        $tel = filtrado($_POST["tel"]);
        // valida formato de teléfono
        if (!preg_match('/^[679]\d{8}$/', $tel)) {
            $correcto = "f";
            $errorTel = "El telefono no tiene formato correcto";
        }
    }

    // valida que no haya errores con los datos
    if ($errorNom == "" && $errorTel == "") {
        // si el telefono existe
        if ($tel === "") {
            // si esta vacio borra el contacto
            unset($agenda[$nom]);
        } else {
            // si no existe el telefono añade el contacto nuevo o sobrescribe el telefono que habia
            $agenda[$nom] = $tel;
        }
    }

    // redirige a este mismo archivo (por GET) con los datos
    $http = "Location: " . $_SERVER["PHP_SELF"] . "?";
    $http .= "nom=" . urlencode($nom);
    $http .= "&errorNom=" . urlencode($errorNom);
    $http .= "&tel=" . urlencode($tel);
    $http .= "&errorTel=" . urlencode($errorTel);

    // Se recorre el array por clave-valor: $nombre => $telefono
    foreach ($agenda as $n => $t) {
        $http .= "&agenda[" . urlencode($n) . "]=" . urlencode($t);
    }

    header($http);
    exit;
}

// muestra los datos en el html

// leer datos
$nom = strip_tags($_GET["nom"] ?? "");
$tel = strip_tags($_GET["tel"] ?? "");
$errorNom = strip_tags($_GET["errorNom"] ?? "");
$errorTel = strip_tags($_GET["errorTel"] ?? "");

// agenda es un array asociativo pasado con pares clave-valor: nombre => telefono
$agenda = $_GET["agenda"] ?? [];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica de examen: Agenda</title>
</head>

<body>
    <textarea disabled><?php
    if (!empty($agenda)) {
        foreach ($agenda as $n => $t) {
            echo htmlspecialchars($n) . " - " . htmlspecialchars($t) . "\n";
        }
    }
    ?></textarea>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <!-- Un foreach de inputs porque un array no se puede pasar en un input -->
        <?php foreach ($agenda as $n => $t): ?>
            <input type="hidden" name="agenda[<?= htmlspecialchars($n) ?>]" value="<?= htmlspecialchars($t) ?>">
        <?php endforeach; ?>

        <label for="nom">Nombre: </label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($nom) ?>">
        <?php
        if ($errorNom != "") {
            echo "<span style='color: red;'>" . $errorNom . "</span>";
        }
        ?>

        <label for="tel">Telefono:</label>
        <input type="number" id="tel" name="tel" value="<?= htmlspecialchars($tel) ?>">
        <?php
        if ($errorTel != "") {
            echo "<span style='color: red;'>" . $errorTel . "</span>";
        }
        ?>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>