<?php

// Tienes dos notas de examen guardadas en $a y $b. Imprime a y b.

// Calcula la suma y guárdala en $suma, calcula la multiplicación y 
// guárdala en $mult y calcula la media (suma entre 2) y guárdala en $media.

// Imprime $media usando var_dump y redondea $media usando round()  guardándolo en $nota_final.

// Si $nota_final es mayor que 5, imprime "Aprobado con nota" Si no, 
// si $nota_final es menor que 5, imprime "Suspenso" Si no, imprime "Aprobado justo".

$a = 5;
$b = 3.5;
echo "El examen 1 tiene una nota de $a y el examen 2 un $b.<br>";

$suma = $a + $b;
$mult = $a * $b;
$media = $suma / 2;

echo "La nota media de ambos exámenes es: ";
var_dump($media);
$nota_final = round($media);
echo"<br>";

if ($nota_final > 5) {
    echo "Aprobado con nota.";
} else if ($nota_final < 5) {
    echo "Suspenso.";
} else {
    echo "Aprobado justo.";
}

?>