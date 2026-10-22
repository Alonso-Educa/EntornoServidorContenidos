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

    for ($i = 1; $i < max([$num1, $num2]); $i++) {
        if ($num1 % $i == 0 && $num1 != $i)
            array_push($div1, $i);

        if ($num2 % $i == 0 && $num2 != $i)
            array_push($div2, $i);
    }

    return array_sum($div1) === array_sum($div2) ? "$num1 y $num2 son numeros amigos<br>" : "$num1 y $num2 no son numeros amigos<br>";
}

echo "220 y 284: " . isAmigo(220, 284);
echo "220 y 285: " . isAmigo(220, 285);
echo "1184 y 1210: " . isAmigo(1184, 1210);
?>