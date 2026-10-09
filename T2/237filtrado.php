<?php

function paresArray($a){
    $pares=[];
    foreach($a as $valor){
        if($valor%2==0){
            array_push($pares,$valor);
        }
    }
    echo"Los ".count($pares)." numeros pares son: [ ";
    foreach($pares as $par){
        echo $par." ";
    }
    echo"]</br>";
}

$numeros = $_POST["numeros"];
$a = explode(' ', $numeros);
paresArray($a);

?>