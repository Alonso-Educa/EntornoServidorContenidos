<?php

include_once('validaciones.php');

// Genera un formulario que contenga:
// a. Nombre
// b. Apellidos
// c. Fecha en un formato que tu elijas
// d. DNI
// e. Selecciona las asignaturas check (Al menos 3)
// f. Correo electrónico
// Todos los campos tienen que ser validados, por una librería validaciones.php
// Si hay alguno de los campos del formulario que no están correctos, se muestra un
// mensaje en rojo.

$nom = $_POST["nom"];
$ape = $_POST["ape"];
$fec = $_POST["fec"];
$dni = $_POST["dni"];
// $asi = $_POST["asi"];
$ema = $_POST["ema"];

echo validaNombre($nom) ?  "Formato de nombre correcto" : "Formato de nombre incorrecto";
echo validaApe($ape) ? "Formato de apellido correcto" : "Formato de apellido incorrecto";
echo validaFec($fec) ? "Formato de fecha correcto" : "Formato de fecha incorrecto";
echo validaDni($dni) ? "Formato de dni correcto" : "Formato de dni incorrecto";
// echo validaAsi($asi) ? "Formato de asignatura correcto" : "Formato de asignatura incorrecto";
echo validaEma($ema) ? "Formato de email correcto" : "Formato de email incorrecto";
?>