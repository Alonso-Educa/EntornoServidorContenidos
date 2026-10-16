<?php

include_once('240generaContrasenya.php');

$tam=-5;
if(generaContrasenya($tam)!==false){
    echo generaContrasenya($tam);
}else{
    echo "No puedes meter un tamaño de array negativo.";
}
echo "</br>";
$tam=10;
if(generaContrasenya($tam)!==false){
    echo generaContrasenya($tam);
}else{
    echo "No puedes meter un tamaño de array negativo.";
}
echo "</br>";
$tam=20;
if(generaContrasenya($tam)!==false){
    echo generaContrasenya($tam);
}else{
    echo "No puedes meter un tamaño de array negativo.";
}
echo "</br>";

?>