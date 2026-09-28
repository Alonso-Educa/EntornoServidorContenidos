<?php
$array = [];
$max = 0;
$min = 100;
$suma = 0;
for ($i = 0; $i < 33; $i++) {
    $array[$i] = rand(0, 100);
    if ($array[$i] > $max) {
        $max = $array[$i];
    }
    if ($array[$i] < $min) {
        $min = $array[$i];
    }
    $suma += $array[$i];
}
echo "El mayor número ha sido el $max.<br>";
echo "El menor número ha sido el $min.<br>";
echo "La media ha sido de " . round($suma / 33, 2) . ".<br>";

?>