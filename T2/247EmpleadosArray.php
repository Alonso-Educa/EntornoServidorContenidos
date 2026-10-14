<?php

// Crea un array de 3 Empleados y recórrelo mostrando sus propiedades 
// y llama a sus métodos. Usa una tabla para mostrar los datos.

include_once('245EmpleadoSueldo.php');

$empleados = [new Empleado("Juan", "Pepe"), new Empleado("Alonso", "Rogado", 1), new Empleado("Mauro", "Pepe", 6700)];

foreach ($empleados as $e) {
    echo "Empleado " . $e->getNombre() . " " . $e->getApellidos() . ":<br>";
    echo "Debe pagar impuestos: ";
    var_dump($e->debePagarImpuestos());
    echo "<br>";
    echo "Telefonos: " . $e->listarTelefonos() . "<br>";
    echo $e->getDatosCompleto();
    echo "<br>";
}
?>