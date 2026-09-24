<?php 

$ps=0.000587;
$h=458;

echo "Si el precio de la luz está a ".$ps."$/s y este mes he consumido durante ".$h." horas:<br>";
echo"¿Qué precio en céntimos habré gastado a lo largo del mes?<br>";
echo"Nota: 1€=1.23\$.";

$x=$ps*3600; // Se pasa a $/hç

$x*=$h; // Se multiplican las horas por el precio por hora, se obtiene el gasto mensual



?>