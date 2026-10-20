<?php

include_once('227parametrosVariables.php');

echo 'Función mayor(): int</br>';
echo "El numero mayor del array es: " . mayor(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12) . ".<br>";
echo "El numero mayor del array es: " . mayor(1, 20, 300, 45, 55, 67, 75, 8, 999, 105, 11, 1200) . ".<br>";

echo '</br>Función concatenar(...$palabras): string';
echo "</br>" . concatenar("hola", "hola2", ",", "a", "juan", "alonso");
echo "</br>" . concatenar("palabra1", "palabra2", "palabra3", "palabra4", "palabra5", "palabra6");

?>