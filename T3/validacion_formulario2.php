<?php

$nom = $_POST["nom"];
$ape = $_POST["ape"];
$fec = $_POST["fec"];
$dni = $_POST["dni"];
$ema = $_POST["ema"];

echo "<table border='1'>";

echo "<tr><th>Nombre</th>";
if (!isset($nom)) {
    echo "<td></td>";
    echo "<td><p style='color: red;'>Nombre no introducido</p></td>";
} else {
    echo "<td>$nom</td>";
    echo validarFormato($nom, '/\w{3}/u') ? "<td><p>Formato de nombre correcto</p>" : "<td><p style='color: red;'>Formato de nombre incorrecto</p></td>";
}
echo "</tr>";

echo "<tr><th>Apellidos</th>";
if (!isset($ape)) {
    echo "<td></td>";
    echo "<td><p style='color: red;'>Apellidos no introducido</p></td>";
} else {
    echo "<td>$ape</td>";
    echo validarFormato($ape, '/\w{3,}\s\w{3,}/u') ? "<td><p>Formato de apellidos correcto</p></td>" : "<td><p style='color: red;'>Formato de apellidos incorrecto</p></td>";
}
echo "</tr>";

echo "<tr><th>Fecha</th>";
// validar que exista
if (!isset($fec)) {
    echo "<td></td>";
    echo "<td><p style='color: red;'>Fecha no introducida</p></td>";
} else {
    echo "<td>$fec</td>";

    // validar el formato general
    if (!validarFormato($fec, '/^\d{4}-\d{2}-\d{2}$/')) {
        echo "<td><p style='color: red;'>Formato de fecha incorrecto</p></td>";
    } else {
        // validar que la fecgha tebnga sentido y si es mayor o menor
        $fecha = date_parse($fec);

        if (!checkdate($fecha["month"], $fecha["day"], $fecha["year"])) {
            echo "<td><p style='color: red;'>Fecha no válida</p></td>";
        } else {
            $limite = (date("Y") - 18) . date("-m-d");   // se construye a partir de la fecha de hoy hace 18 años
            echo $fec <= $limite ? "<td><p>Fecha correcta. Eres mayor de edad.</p></td>" : "<td><p style='color: red;'>Eres menor de edad.</p></td>";
        }
    }
}
echo "</tr>";

echo "<tr><th>Dni</th>";
if (!isset($dni)) {
    echo "<td></td>";
    echo "<td><p style='color: red;'>Dni no introducido</p></td>";
} else {
    $numeros = substr($dni, 0, 8);
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letra = $letras[(int) $numeros % 23];

    echo "<td>$dni</td>";
    echo validarFormato(strtoupper($dni), "/^\d{8}$letra$/") ? "<td><p>Formato de dni correcto</p></td>" : "<td><p style='color: red;'>Formato de dni incorrecto</p></td>";
}
echo "</tr>";

echo "<tr><th>Email</th>";
if (!isset($ema)) {
    echo "<td></td>";
    echo "<td><p style='color: red;'>Email no introducido</p></td>";
} else {
    echo "<td>$ema</td>";
    echo validarFormato($ema, '/^.+@.+\..{2,}+$/') ? "<td><p>Formato de email correcto</p></td>" : "<td><p style='color: red;'>Formato de email incorrecto</p></td>";
}
echo "</tr>";
echo "</table>";


function validarFormato($s, $exp)
{
    return preg_match($exp, $s) === 1;
}

?>