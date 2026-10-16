<?php

$e = new Empleado("Juan","Pepe");
$e2 = new Empleado("Alonso","Rogado",50000);
echo $e->getDatosCompleto();
echo $e2->getDatosCompleto();

?>