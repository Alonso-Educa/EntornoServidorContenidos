<?php

include_once('241Empleado.php');

$e1 = new Empleado("Juan", "Pepe", 1667);
$e2 = new Empleado("Alonso", "Rogado", 100);

echo $e1->getDatosCompleto();
echo $e2->getDatosCompleto();

echo $e1->getNombre() . " debe pagar impuestos: ";
var_dump($e1->debePagarImpuestos());
echo "<br>";

echo $e2->getNombre() . " debe pagar impuestos: ";
var_dump($e2->debePagarImpuestos());
echo "<br>";

$e3 = new Empleado(1, "juan", 1000);
$e3->setSueldo(1);
echo $e3->getDatosCompleto();

?>