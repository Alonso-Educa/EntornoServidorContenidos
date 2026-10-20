<?php

include_once('226arrayPar.php');

echo 'Función esPar(int $num): bool</br>';
echo "esPar (12): " . esPar(12) . "</br>"; // Par
echo "esPar (11): " . esPar(11) . "</br>"; // impar

echo '</br>Función arrayAleatorio(int $tam, int $min, int $max) : array</br>';
print_r(arrayAleatorio(5, 0, 100));
echo "</br>";
print_r(arrayAleatorio(10, 1, 10));
echo "</br>";

echo '</br>Función arrayPares(array &$array): int</br>';
echo "Habia " . arraypares([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]) . " numeros pares en el array.<br>";
echo "Habia " . arraypares([1, 3, 5, 7, 9, 11]) . " numeros pares en el array.<br>";
echo "Habia " . arraypares([2, 4, 6, 8, 10, 12]) . " numeros pares en el array.<br>";

?>