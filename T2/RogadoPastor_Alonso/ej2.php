<?php

// Haz una función que genere números aleatorios que se le pase como parámetros:

// a. Array para lo rellene con los números
// b. Número mínimo incluido
// c. Número máximo incluido
// d. Numero de números generados
// e. True si puedes repetirse/ False si no pueden repetirse
function rellenarArray($a, $min, $max, $cant, $bool)
{
    if($bool && $cant >$max){
        return "Error";
    }
    for ($i = 0; $i < $cant; $i++) {
        if ($bool) {
            $n = rand($min, $max);
            array_push($a, $n);
        } else {
            do {
                $n = rand($min, $max);
            } while (array_search($n, $a));
            array_push($a, $n);
        }
    }
    return $a;
}

$a=[];
$b=[];
$a=rellenarArray($a,1,10,10,true);
echo "Valores: ";
foreach($a as $valor){
    echo $valor." ";
}

echo "<br>";

$b=rellenarArray($b,1,10,10,false);
echo "Valores: ";
foreach($b as $valor){
    echo $valor." ";
}
?>