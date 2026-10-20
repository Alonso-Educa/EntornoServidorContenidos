<?php
// 1. Usar shuffle en el array
// 2. Generar numero aleatorio y si está repetido generarlo de nuevo

$array = [];
$max = 50;
while (count($array) < $max / 2) {
    $n = rand(1, $max);
    if (!in_array($n, $array) && $n%2==0) {
        array_push($array, $n);
    }
}

echo "Lista desordenada de numeros pares del 1 - $max:<br>";
echo "<ul>";
for ($i = 0; $i < $max / 2; $i++) {
    echo "<li>" . $array[$i] . "</li>";
}
echo "</ul>";
?>