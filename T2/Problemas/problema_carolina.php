<?php

//$a = 8;
//$b = 3;
//$d = 2;

# Averigua el valor de $c e imprime el resultado de $c por pantalla
# Se quiere saber si:
# El doble de b, se resta a a y se comprueba si el resultado es mayor o igual que d + 1.
# || el resto de dividir a entre 2 y se comprueba si es igual a 0. Es decir, se comprueba si a es un número par.
# && Se suma 4 a b y se compara con el triple de d. La condición será verdadera si ambos resultados son diferentes.

$a = 8;
$b = 3;
$d = 2;

$c = ($a - $b * 2 >= $d + 1) || ($a % 2 == 0) && ($b + 4 != $d * 3);
echo "El valor de c es: $c.";

?>
