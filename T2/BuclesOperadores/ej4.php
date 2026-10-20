<?php

// Realiza un programa que le introduzca un valor de un producto con 2 decimales y posteriormente
// un valor con el que pagar por encima (Valor del producto 6.33€ y ha pagado con 10€). Muestra el
// número mínimo de monedas con las que puedes devolver el cambio

function calcularPago($n)
{
    $b = [500, 200, 100, 50, 20, 10, 5, 2, 1, 0.5, 0.2, 0.1];
    array_reverse($b);
    if (is_numeric($n)) {
        foreach ($b as $valor) {
            if ($n < $valor) {
                return "Billetes/monedas de $valor: " . ceil($n / $valor);
            }
        }
    }
    return "Billetes/monedas de 500: " . ceil($n / 500);
}

$n = $_POST["pago"];

echo "Para pagar $n € se necesitan ";
calcularPago($n);
echo "€.";
?>