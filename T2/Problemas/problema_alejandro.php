<?php

// Tienes el número 7. Multiplícalo por 3, réstale 5 y comprueba si el resultado es mayor que 15. 
// Después, comprueba si ese resultado es diferente de 16.

$n = 7;
$n *= 3;
$n -= 5;

if ($n > 15) {
    echo "$n es mayor que 15<br>";
} else {
    echo "$n es mayor que 15<br>";
}

if($n!=16){
    echo "$n es diferente de 16";
}else{
    echo "$n es 16";
}

?>