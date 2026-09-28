<?php

// El precio de la luz está a 0.000487$/sec y este mes has consumido durante 458 horas. Deberás calcular:

// ¿Cuántos euros habrás gastado este mes? Nota:  1€ = 1.14$.
// Si has gastado más de 500€ este mes te harán un descuento exclusivo del 3%. Calcula el precio mensual final en base a eso.
// Tomando en cuenta que el resto de meses del año gastas un 15% menos que este, ¿cuál es el precio anual que tendrás?

$precioLuz = 0.000487;
$horasMes = 458;

$gastoMes = $precioLuz / 1.18 * 3600 * 458;
echo "Este mes has gastado " . round($gastoMes, 2) . "€.<br>";

if ($gastoMes > 500) {
    $gastoMes -= $gastoMes * 0.03;
    echo "Como has gastado más de 500€ se te ha aplicado un descuento del 3%. El gasto actualizado del mes es de: " . round($gastoMes, 2) . "€.<br>";
} else {
    echo "Como has gastado menos de 500 € este mes, no se te ha aplicado la promoción.<br>";
}

$gastoAnual = $gastoMes + 11 * $gastoMes * 0.85;
echo "Has gastado " . round($gastoAnual, 2) . "€ este año.";

?>