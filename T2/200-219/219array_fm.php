<?php
for ($i = 0; $i < 100; $i++) {
    $datos[] = rand(0, 1) ? "M" : "F";
}

$total = ['M' => 0, 'F' => 0];
foreach ($datos as $sexo) {
    $total[$sexo]++;
}

echo "Han salido ".$total['M']." 'M' y ".$total['F']." 'F' en total.";
?>