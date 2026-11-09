<?php

// leer datos
// agenda es una matriz bidimensional pasada como texto
$agenda = $_POST["agenda"];
$nom = $_POST["nom"];
$tel = $_POST["tel"];
$errorNom = $_POST["errorNom"];
$errorTel = $_POST["errorTel"];

$correcto = "v";
$errores = [];
if (isset($_POST["agenda"])) {
    $agenda = explode(",", $_POST["agenda"]);
}

for ($i = 0; $i < count($agendaCopia); $i++) {
    $agendaCopia[$i] = explode("-", $agendaCopia[$i]);
}

$errorNom = "";
$nom = "";
if (!isset($_GET["nom"])) {
    $correcto = "f";
    $errorNom = "El nombre no puede estar vacio";
} else {
    $nom = stripslashes(trim($_POST["nom"]));
}

$errorTel = "v";
$tel = "";
if (isset($_GET["tel"])) {
    $tel = $_GET["tel"];
    if (!preg_match('/^[679]\d{8}$/', $tel)) {
        $correcto = "f";
        $errorTel = "El telefono no tiene formato correcto";
    } else {
        $tel = stripslashes(trim($_POST["tel"]));
    }
}

// valida que no haya errores con los datos
if ($errorNom == "" && $errorTel == "") {
    // recorre el bucle
    $estaNom = false;
    for ($i = 0; $i < count($agenda); $i++) {
        // si hay nombre repetido y telefono existe, sobreescribe el telefono
        if ($agenda[$i][0] === $nom && isset($tel)) {
            $agenda[$i][1] = $tel;
            $estaNom = true;
        }
        // si hay nombre repetido y telefono no existe, borra los datos
        else if ($agenda[$i][0] === $nom && !isset($tel)) {
            $agenda[$i] = ["", ""];
            $estaNom = true;
        }
    }

    // si el nombre no estaba en el array lo añade al final
    if (!$estaNom) {
        array_push($agenda, [$nom, $tel]);
    }
}

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
        // if ($agenda != []) {
        //     $agendaNuevo = explode(",", $agenda);
        //     foreach ($agendaNuevo as $dato) {
        //         $datos = explode("-", $dato);
        //         print_r($datos);
        //         echo "<br>";
        //         // echo $datos[0] . " - " . $datos[1] . "<br>";
        //     }
        // }
        
        echo $agenda;

        ?>
    </textarea>

    <!-- <form action="leerAgenda.php" method="post"> -->
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
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
        <?php if ($errorTel != "") {
            echo "<p style='color='red'>" . $errorTel . "</p>";
        }
        ?>
        <input type="number" id="tel" name="tel" value="<?php if ($tel != "") {
            echo $tel;
        } ?>">

        <button type="submit">Enviar</button>
    </form>
</body>

</html>