<?php
$correcto = "v";
$errores = [];
$agenda = explode(",", $_POST["agenda"]) ?? [];

for ($i = 0; $i < count($agenda); $i++) {
    $agenda[$i] = explode("-", $agenda[$i]);
}

$errorNom = "";
$nom = "";
if (!isset($_POST["nom"])) {
    $correcto = "f";
    $errorNom = "El nombre no puede estar vacio";
} else {
    $nom = stripslashes(trim($_POST["nom"]));
}

$errorTel = "v";
$tel = "";
if (isset($_POST["tel"])) {
    $tel = $_POST["tel"];
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

$http = "Destination:agendaForm.php?";
if ($correcto != "v") {
    $http .= "nom=" . urlencode($nom);
    $http .= "&errorNom=" . urlencode($errorNom);
    $http .= "&tel=" . urlencode($tel);
    $http .= "&errorNom=" . urlencode($errorTel);

    for ($i = 0; $i < count($agenda); $i++) {
        $agenda[$i] = implode("-", $agenda[$i]);
    }
    $http .= "&agenda=" . urlencode(implode(",", $agenda));
} else {
    for ($i = 0; $i < count($agenda); $i++) {
        $agenda[$i] = implode("-", $agenda[$i]);
    }
    $http .= "agenda=" . urlencode(implode(",", $agenda));
}

header($http);
exit;

?>