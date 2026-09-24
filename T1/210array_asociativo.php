<?php
$arr1 = array(
    "Espana" => "Madrid",
    "Portugal" => "Lisboa",
    "Francia" => "Paris",
    "Alemania" => "Berlin",
    "Reino Unido" => "Londres"
);

$paises = [];
$cap = [];
$i = 0;
echo"Array asociativo:<br>";
foreach ($arr1 as $codigo => $nombre) {
    echo "La capital de $codigo es $nombre.<br>";
    $paises[$i] = $codigo;
    $cap[$i] = $nombre;
    $i++;
}

echo"<br>Array normal:<br>";
for($i=0; $i<count($cap);$i++){
    echo "La capital de ".$paises[$i]." es $cap[$i].<br>";
}
?>