<?php

include_once('231vocales.php');
include_once('231vocales_ascii.php');

$v = vocales("Murcielago");
echo "Murcielago:<br>";
echo "a = " . $v["a"] . "<br>";
echo "e = " . $v["e"] . "<br>";
echo "i = " . $v["i"] . "<br>";
echo "o = " . $v["o"] . "<br>";
echo "u = " . $v["u"] . "<br>";

$v = vocales("frase de pruebaaaas geusbcufvooi");
echo "<br>frase de pruebaaaas geusbcufvooi:<br>";
echo "a = " . $v["a"] . "<br>";
echo "e = " . $v["e"] . "<br>";
echo "i = " . $v["i"] . "<br>";
echo "o = " . $v["o"] . "<br>";
echo "u = " . $v["u"] . "<br>";



$a = [65, 69, 73, 79, 85, 97, 101, 105, 111, 117];
$v = vocales_ascii($a);
print_r($a);
echo "<br>";
echo "a = " . $v["a"] . "<br>";
echo "e = " . $v["e"] . "<br>";
echo "i = " . $v["i"] . "<br>";
echo "o = " . $v["o"] . "<br>";
echo "u = " . $v["u"] . "<br>";

$a = [65, 66, 67, 67, 69, 70];
print_r($a);
echo "<br>";
$v = vocales_ascii($a);

// echo "<br>frase de pruebaaaas vueydvbjwsae:<br>";
echo "a = " . $v["a"] . "<br>";
echo "e = " . $v["e"] . "<br>";
echo "i = " . $v["i"] . "<br>";
echo "o = " . $v["o"] . "<br>";
echo "u = " . $v["u"] . "<br>";

?>