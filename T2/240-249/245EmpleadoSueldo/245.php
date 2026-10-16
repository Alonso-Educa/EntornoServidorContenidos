<?php

include_once('245EmpleadoSueldo.php');

$e = new Empleado("Juan", "Pepe");
$e2 = new Empleado("Alonso", "Rogado", 50000);
echo $e->getDatosCompleto();
echo $e2->getDatosCompleto();
echo $e2->getNombre() . " debe pagar impuestos: ";
var_dump($e2->debePagarImpuestos());
echo "<br>";
Empleado::setSueldoTope(100000);
echo $e2->getNombre() . " debe pagar impuestos: ";
var_dump($e2->debePagarImpuestos());
echo "<br>";

?>