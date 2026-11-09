<?php

function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

$correcto = "v";
$errores = [];
$agenda = isset($_POST["agenda"]) ?? [];

$errorNom = "";
$nom = "";
// valida si nombre existe
if (!isset($_POST["nom"])) {
    $correcto = "f";
    $errorNom = "El nombre no puede estar vacio";
} else {
    $nom = filtrado($_POST["nom"]);
}

$errorTel = "v";
$tel = "";
if (isset($_POST["tel"])) {
    $tel = $_POST["tel"];
    // valida formato de teléfono
    if (!preg_match('/^[679]\d{8}$/', $tel)) {
        $correcto = "f";
        $errorTel = "El telefono no tiene formato correcto";
    } else {
        $tel = filtrado($_POST["tel"]);
    }
}

// valida que no haya errores con los datos
if ($errorNom == "" && $errorTel == "") {
    // si el nombre existe
    if (!isset($agenda[$nom])) {
        // si el nombre no está se introduce el valor
        $agenda[$nom] = $tel;
    } else {
        if (isset($tel)) {
            // si el telefono existe, sobreescribe el telefono
            $agenda[$nom] = $tel;
        } else {
            // si el telefono no existe, borra los datos del array
            unset($agenda[$nom]);
        }
    }
}

$http = "Location:agendaForm.php?";
if ($correcto != "v") {
    $http .= "nom=" . urlencode($nom);
    $http .= "&errorNom=" . urlencode($errorNom);
    $http .= "&tel=" . urlencode($tel);
    $http .= "&errorNom=" . urlencode($errorTel);

    // Se recorre el array por clave-valor: $nombre => $telefono
    foreach ($agenda as $n => $t) {
        $http .= "&agenda[" . urlencode($n) . "]=" . urlencode($t);
    }
} else {
    // Se recorre el array por clave-valor: $nombre => $telefono
    foreach ($agenda as $n => $t) {
        $http .= "&agenda[" . urlencode($n) . "]=" . urlencode($t);
    }
}

header($http);
exit;

?>