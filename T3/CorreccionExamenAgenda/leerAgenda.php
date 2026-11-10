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
$agenda = $_POST["agenda"] ?? [];

$errorNom = "";
$nom = "";
// valida si nombre existe y no esta vacio
if (empty($_POST["nom"])) {
    $correcto = "f";
    $errorNom = "El nombre no puede estar vacio";
} else {
    $nom = filtrado($_POST["nom"]);
}

$errorTel = "";
$tel = "";
if (!empty($_POST["tel"])) {
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
    // si el telefono existe
    if ($tel === "") {
        // si esta vacio borra el contacto
        unset($agenda[$nom]);
    } else {
        // si no existe el telefono añade el contacto nuevo o sobrescribe el telefono que habia
        $agenda[$nom] = $tel;
    }
}

$http = "Location:agendaForm.php?";
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

?>