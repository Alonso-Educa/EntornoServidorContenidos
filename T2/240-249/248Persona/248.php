<?php

include_once('248Persona.php');

$e1 = new Empleado248("Juan", "Pepe", "2010-10-22", 50000);
$e1->setTelefonos([123456789, 123456789, 123456780]);
echo "Empleado 1:<br>";
echo $e1->imprimirDatos() . "<br>";
echo $e1 . "<br>";
echo $e1->debePagarImpuestos() ? "Salario alto, debe pagar impuestos" : "Salario bajo, no debe pagar impuestos";
echo "<br>";
$e2 = new Empleado248("Alonso", "rogado pastor", "2005-10-22");
echo "<br>Empleado 2:<br>";
echo $e2->imprimirDatos() . "<br>";
echo $e2 . "<br>";
echo $e2->debePagarImpuestos() ? "Salario alto, debe pagar impuestos" : "Salario bajo, no debe pagar impuestos";

?>