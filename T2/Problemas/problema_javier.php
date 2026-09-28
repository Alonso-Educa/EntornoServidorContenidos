<?php

// Una tienda vende 8 camisetas a 15 € cada una y hace un descuento de 20 €.
// Después, se añade un coste de envío de 5 €. 
// Queremos calcular el precio final y comprobar si supera los 100 €.

$precio = (8 * 15 - 20) + 5;

if ($precio > 100) {
    echo "El precio final es de $precio € y supera los 100 €.";
} else {
    echo "El precio final es de $precio € y no supera los 100 €.";
}

?>