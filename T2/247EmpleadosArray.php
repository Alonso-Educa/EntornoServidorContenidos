<?php

// Crea un array de 3 Empleados y recórrelo mostrando sus propiedades 
// y llama a sus métodos. Usa una tabla para mostrar los datos.

include_once('245EmpleadoSueldo.php');

$empleados = [new Empleado("Juan", "Pepe"), new Empleado("Alonso", "Rogado", 1), new Empleado("Mauro", "Pepe", 6700)];

foreach ($empleados as $e) {
    echo "<table border = '1'>";
    echo "<tr><th>Nombre</th><td>" . $e->getNombre() . "</td></tr>";
    echo "<tr><th>Apellido</th><td>" . $e->getApellidos() . "</td></tr>";
    echo "<tr><th>Sueldo</th><td>" . $e->getSueldo() . "</td></tr>";
    echo "<tr><th>Telefonos</th><td>" . $e->listarTelefonos() . "</td></tr>";
    echo "<tr><th>Debe pagar impuestos</th><td>" . ($e->debePagarImpuestos() ? "Debe pagar impuestos" : "No debe pagar impuestos") . "</td></tr>";
    echo "</table>";
    echo $e->getDatosCompleto();
    echo "<br>";
}
?>