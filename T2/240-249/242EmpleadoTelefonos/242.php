<?php

include_once('242EmpleadoTelefonos.php');

$e = new Empleado("Juan", "Pepe", 1667);

$e->anadirTelefono(123456789);
$e->anadirTelefono(234567890);
$e->anadirTelefono(345678901);

echo $e->getDatosCompleto();
echo "Telefonos de " . $e->getNombre() . ": " . $e->listarTelefonos() . "<br>";

$e->vaciarTelefonos();
echo "Telefonos de " . $e->getNombre() . ": " . $e->listarTelefonos() . "<br>";

?>