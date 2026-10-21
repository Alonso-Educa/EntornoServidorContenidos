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

// correccion: poner ?? por si vienen vacios y que no de error
$nom = $_POST["nom"] ?? "";
$ape = $_POST["ape"] ?? "";
$fec = $_POST["fec"] ?? "";
$dni = $_POST["dni"] ?? "";
$asi = $_POST["asi"] ?? [];
$ema = $_POST["ema"] ?? "";

// correccion: imprimir los campos que fallan en rojo
echo validaNombre($nom) ?  "Formato de nombre correcto<br>" : "<p style='color:red'>Formato de nombre incorrecto</p>";
echo validaApe($ape) ? "Formato de apellido correcto<br>" : "<p style='color:red'>Formato de apellido incorrecto</p>";
echo validaFec($fec) ? "Formato de fecha correcto<br>" : "<p style='color:red'>Formato de fecha incorrecto</p>";
echo validaDni($dni) ? "Formato de dni correcto<br>" : "<p style='color:red'>Formato de dni incorrecto</p>";
echo validaAsi($asi) ? "Formato de asignatura correcto<br>" : "<p style='color:red'>Formato de asignatura incorrecto</p>";
echo validaEma($ema) ? "Formato de email correcto<br>" : "<p style='color:red'>Formato de email incorrecto</p>";
?>