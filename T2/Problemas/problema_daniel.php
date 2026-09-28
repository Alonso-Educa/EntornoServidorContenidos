<?php

##Calcula el valor de c sabiendo que var1=3 y var2=5. Para ello
##comprueba si el cuadrado de var2 es mayor o igual
##que la comparación en la que se suma var2 a var1
##y se comparacon el resto de dividir var2 entre var1. Luego aplica la
##operación xor con la comparación en la que var1 se
##compara con la negación de la diferencia entre var2 y var1.

$var1 = 3;
$var2 = 5;

$c = ($var2 ** 2 >= ($var1 + $var2 == $var2 % $var1)) xor ($var1 == !($var2 - $var1));

if ($c) {
    echo "El valor de c es verdadero.";
} else {
    echo "El valor de c es falso.";
}
?>