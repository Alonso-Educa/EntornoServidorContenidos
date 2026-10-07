<?php

// a partir de una frase, devuelve la cantidad de cada una de las vocales, y el total de ellas.
function vocales($s){
    $vocales = array(
        "a" => 0,
        "e" => 0,
        "i" => 0,
        "o" => 0,
        "u" => 0,
    );
    $vocales["a"]=substr_count($s,'a');
    $vocales["e"]=substr_count($s,'e');
    $vocales["i"]=substr_count($s,'i');
    $vocales["o"]=substr_count($s,'o');
    $vocales["u"]=substr_count($s,'u');
    return $vocales;
}
$v=vocales("Murcielago");
echo "Murcielago:<br>";
echo "a = ".$v["a"]."<br>";
echo "e = ".$v["e"]."<br>";
echo "i = ".$v["i"]."<br>";
echo "o = ".$v["o"]."<br>";
echo "u = ".$v["u"]."<br>";

$v=vocales("frase de pruebaaaas geusbcufvooi");
echo "<br>frase de pruebaaaas geusbcufvooi:<br>";
echo "a = ".$v["a"]."<br>";
echo "e = ".$v["e"]."<br>";
echo "i = ".$v["i"]."<br>";
echo "o = ".$v["o"]."<br>";
echo "u = ".$v["u"]."<br>";
?>