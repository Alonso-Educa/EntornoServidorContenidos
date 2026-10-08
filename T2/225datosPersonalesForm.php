<?php
include "225datosPersonales.php";

$nombre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$email = $_POST["email"];
$anio = $_POST["anio"];
$tlf = $_POST["tlf"];
$foto = $_POST["foto"];

$datos=array(
    "nombre" => $nombre,
    "apellido1" => $apellido1,
    "apellido2" => $apellido2,
    "email" => $email,
    "anio" => $anio,
    "tlf" => "+34 ".$tlf,
    "foto" => $foto,
);

crearTabla($datos);
?>