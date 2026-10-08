<?php

$personas = array(
    array("Nombre" => "Juan", "Edad" => 25),
    array("Nombre" => "María", "Edad" => 30),
    array("Edad" => 30)
);

echo $personas[0]["Nombre"]; // Esto imprimirá "Juan"
$personas[1]["Edad"] = 35; // Modifica la edad de María
echo $personas[1]["Edad"]; // Esto imprimirá 35
echo"<br>";

foreach ($personas as $fila) {
    foreach ($fila as $elemento) {
        echo $elemento . " ";
    }
    echo "<br>"; // Salto de línea al final de cada fila
}

foreach($personas as $persona => $edad){
    echo "$persona, $edad";
}

echo $personas[2]["nombre"];
?>