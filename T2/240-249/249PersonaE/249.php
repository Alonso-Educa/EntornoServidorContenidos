<?php

include_once('249PersonaE.php');

$p1 = new PersonaE("Juan", "Pepe", "2010-10-22", 50000);
$p1->setTelefonos([123456789, 123456789, 123456780]);
echo "Persona 1:<br>";
echo $p1->imprimirDatos() . "<br>";
echo "Edad: " . $p1->getEdad() . "<br>";
echo $p1 . "<br>";
echo $p1->debePagarImpuestos() ? "Salario alto, debe pagar impuestos" : "Salario bajo, no debe pagar impuestos";
echo "<br>";
$p2 = new PersonaE("Alonso", "rogado pastor", "2005-10-22");
echo "<br>Persona 2:<br>";
echo $p2->imprimirDatos() . "<br>";
echo "Edad: " . $p2->getEdad() . "<br>";
echo $p2 . "<br>";
echo $p2->debePagarImpuestos() ? "Salario alto, debe pagar impuestos" : "Salario bajo, no debe pagar impuestos";

?>