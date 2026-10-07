<?php

// include "226arrayPar_copia.php";
// include "227parametrosVariables.php";

// $entrada = "12345";

// is_int($entrada);
// if(is_int($entrada)){
//     if(esPar($entrada)){
//         echo "El numero $entrada es par.";
//     }else{
//         echo "El numero $entrada es impar.";
//     }
// }else{
//     echo "No has introducido un entero";
// }

// echo "Array creado: ";
// $a=arrayAleatorio(5,1,5000);
// // print_r($a);
// // echo "</br>";
// // for($i=0;$i<count($a);$i++){
// //     echo $a[$i]."</br>";
// // }
// // foreach($a as $num){
// //     echo $num."</br>";
// // }
// print_r($a);
// echo "</br>";
// echo arrayPares($a);
// echo "</br>";
// print_r($a);

// imprimirArray(['a','4','v','sdc','e']);

function crearCSV()
{
    $palabras = func_get_args();
    foreach ($palabras as $valor) {
        $csv = explode(" ",$valor);
        print_r($csv);
    }
}
crearCSV('hola','a',456,79,'a2');

function concatenar (...$palabras){
    $texto='';
    foreach ($palabras as $palabra){
        if($texto !== ''){
            $texto += ',';
        }
        $texto = $texto . $palabra;
    }
    return $texto;

}

// terminar
function csv($frase){
return str_replace();
}
?>