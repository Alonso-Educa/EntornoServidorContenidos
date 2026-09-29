<?php
$arr1 = array(
    10 => "3000",
    20 => "4000",
    30 => "6000",
);
print_r($arr1);
echo "<br>";
$arr2 = array(
    10 => "8000",
    15 => "6000",
    20 => "4000",
);
print_r($arr2);
echo "<br>";
$arr3 = $arr1 + $arr2;
print_r($arr3); // Se mantiene el array de la izquierda en caso de conflicto, se concatenan en el mismo orden que con los strings
$arr4 = $arr2 + $arr1;
var_dump($arr4);
if( $arr4==$arr3){
    echo"<br>Son iguales";
}else{
    echo "<br>No son iguales";
}
?>
// parametro (elemento dentro de lsos parentesis que permiten parametrizar), listas/colas/pilas, algoritmo, sistema, puntero