<?php

include_once('244EmpleadoConstante.php');

$e = new Empleado("Juan", "Pepe");
$e2 = new Empleado("Alonso", "Rogado", 50000);
echo $e->getDatosCompleto();
echo $e2->getDatosCompleto();

echo $e->debePagarImpuestos() ? "debe pagar impuestos" : "No debe pagar impuestos";

?>