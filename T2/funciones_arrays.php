<?php

// Sort & Asort
$a = [1, 5, 21, 3, 2, "a", ".", "barcelona", "zamora", "alicante", "ñandu", "Malaga", "/"];
echo "Original: ";
print_r($a);
$e1 = sort($a);
echo "<br> Sort: ";
print_r($a);

$a = [1, 5, 21, 3, 2, "a", "."];
asort($a);
echo "<br>Asort: ";
print_r($a);

// Isset & Unset
// Isset busca por indice, in_array por valor
$a1 = array(
    "a" => 1,
    "b" => 2,
    "c" => 3,
    "d" => 1
);

echo isset($a1["a"]);
// echo isset($a1[1]);
echo in_array(1, $a1);
// echo in_array("a",$a1);

unset($a1["a"]); // Clave
print_r($a1);

$a = [1, 2, 3, 4, 5, 1, 1];
unset($a[1]); // Clave
print_r($a);

// Slice
$a = [0, 1, 2];
echo "<br>";
$a2 = array_slice($a, 1, 1); // En el array a, corta a partir de la posición 1 y solo pilla un valor [1,2]
print_r($a2);
$a2 = array_slice($a, 1, -1); // En el array a, corta a partir de la posición 1 y pilla hasta la penultima posicion [1,2]
print_r($a2);
$a2 = array_slice($a, 2, -2); // Array vacio porque corta de la posicion 2 a la -2 lo cual no es posible [2,1]
print_r($a2);
$a2 = array_slice($a, 1, -2); // Array vacio porque corta de la posicion 1 a la -2 lo cual no es posible (corta de la 1 a la 1, por lo que no corta nada) [1,1]
print_r($a2);

// Merge
$a = [1, 2, 3, 4];
$a1 = ["a", "b", "c"];
$a2 = ["rt", 5, 6];

echo "<br>";
print_r(array_merge($a, $a1, $a2));
echo "<br>";
$a = array(
    "a" => 1,
    "b" => 2
);
$a1 = array(
    1 => 1,
    "a" => 3 // Esta a sobreescribe la anterior clave a
);
print_r(array_merge($a, $a1));
?>