
<?php
    $arr1 = array(
        1 => "3000",
        2 => "4000",
    );
    $arr2 = array(
        1 => 3000,
        2 => 4000,
    );
    $arr3 = array(
        2 => "4000",
        1 => "3000",
    );
    if($arr1 == $arr2){
        echo "arr1 y arr2 son iguales <br>"; // Si, los valores son iguales aunque el tipo de dato no
    }else{
        echo "arr1 y arr2 no son iguales <br>";
    }
    if($arr1 == $arr3){
        echo "arr1 y arr3 son iguales <br>"; // Si, porque no importa el orden si los valores son iguales
    }else{
        echo "arr1 y arr3 no son iguales <br>";
    }
    if($arr1 === $arr2){
        echo "arr1 y arr2 son idénticos <br>";
    }else{
        echo "arr1 y arr2 no son idénticos <br>"; // No, porque el tipo de dato no es el mismo
    }
    if($arr1 === $arr3){
        echo "arr1 y arr3 son idénticos <br>";
    }else{
        echo "arr1 y arr3 no son idénticos <br>"; // No, porque el orden no es el mismo
    }

    ?>