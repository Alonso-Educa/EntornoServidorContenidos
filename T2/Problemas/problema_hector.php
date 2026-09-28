<?php

// Calcular de manera simple las siguientes variables para un pedido de Amazon partiendo-
// como base del precio = 10 y cantidad = 3:
// Calcula el precio_total.
// Rebaja de 5 en caso de que el precio_total sea mayor a 20.
// Determina si el producto es caro si su valor unitario sobrepasa los 15.
// Tiene envio gratis en caso de que el pedidio cueste 30 o mas y si es cliente de Amazon prime (en este caso no lo es).
// Regalo promocional si compra mas de 2 articulos.

$p = 10;
$c = 3;
$precio_total = $p * $c;
echo "El precio total de la compra es de $precio_total €.<br>";

if ($precio_total > 20) {
    $precio_total -= 5;
    echo "La compra supera los 20€, se rebajan 5€. El nuevo total es de $precio_total €.<br>";
} else {
    echo "La compra supera los 20€, no se realiza ningún descuento.<br>";
}

if ($p > 15) {
    echo "El producto es caro porque su valor unitario excede los 15€.<br>";
} else {
    echo "El producto no es caro porque su valor unitario no excede los 15€.<br>";
}

$tiene_prime = false;
if ($precio_total >= 30 && $tiene_prime) {
    echo "Como ha gastado al menos 30€ tiene envío gratis.<br>";
} else {
    echo "Como ha gastado menos de 30€ tiene envío normal.<br>";
}

if ($c > 2) {
    echo "Como ha comprado al menos 2 artículos tiene regalo promocional.<br>";
} else {
    echo "Como ha comprado menos de 2 artículos no tiene regalo promocional.<br>";
}

?>