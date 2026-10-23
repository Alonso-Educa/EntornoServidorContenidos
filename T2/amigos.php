<?php

// Crea un archivo llamado amigos.php.
// Debe contener un formulario con dos campos numéricos y un botón de envío.
// Al enviar el formulario:
// • Si los dos números son números amigos, se debe mostrar el mensaje:
// 220 y 284 son números amigos.
// • Si no lo son, se debe mostrar:
// 1184 y 1000 no son números amigos.
// • Si alguno de los campos está vacío o no es válido, se debe 
// mostrar:
// Entrada no válida.
// El resultado debe mostrarse en la misma página, debajo del formulario.
// Ejemplos de números amigos válidos:
// • 220 y 284
// • 1184 y 1210

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];

function isAmigo($num1, $num2)
{
    $div1 = [];
    $div2 = [];

    for ($i = 1; $i < max($num1, $num2); $i++) {
        if ($num1 % $i == 0 && $num1 != $i) {
            array_push($div1, $i);
        }
        if ($num2 % $i == 0 && $num2 != $i) {
            array_push($div2, $i);
        }
    }

    echo "Divisores de n1: ";
    print_r($div1);
    echo "<br>Divisores de n2: ";
    print_r($div2);
    echo "<br>";
    echo "Suma de n1: " . array_sum($div1) . ", suma de n2: " . array_sum($div2) . "<br>";

    return ($num2 == array_sum($div1)) && ($num1 == array_sum($div2)) ? "Son numeros amigos<br>" : "No son numeros amigos<br>";
}

if (isset($num1, $num2) && is_numeric($num1) && is_numeric($num2)) {
    echo "n1: " . $num1 . ", n2: " . $num2 . "<br>";
    echo isAmigo($num1, $num2);
}

// echo "220 y 284: " . isAmigo(220, 284);
// echo "220 y 285: " . isAmigo(220, 285);
// echo "1184 y 1210: " . isAmigo(1184, 1210);
?>