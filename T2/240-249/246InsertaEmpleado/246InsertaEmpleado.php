<?php

// Crea un Empleado introduciendo los datos desde formulario y después muestra 
// dichos datos y el resultado de los métodos. Usa una tabla para mostrar los datos.
include_once('../245EmpleadoSueldo.php');

$nom = $_POST["nom"];
$ape = $_POST["ape"];
$sue = $_POST["sue"];

if (is_numeric($sue)) {
    $e = new Empleado($nom, $ape, $sue);
} else {
    $e = new Empleado($nom, $ape);
}

echo "<table border = '1'>";
echo "<tr><th>Nombre</th><td>" . $e->getNombre() . "</td></tr>";
echo "<tr><th>Apellido</th><td>" . $e->getApellidos() . "</td></tr>";
echo "<tr><th>Sueldo</th><td>" . $e->getSueldo() . "</td></tr>";
echo "<tr><th>Telefonos</th><td>" . $e->listarTelefonos() . "</td></tr>";
echo "<tr><th>Debe pagar impuestos</th><td>" . ($e->debePagarImpuestos() ? "Debe pagar impuestos" : "No debe pagar impuestos") . "</td></tr>";
echo "</table>";
echo $e->getDatosCompleto();
?>