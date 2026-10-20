<?php
// Valor por defecto si no se indica ninguno en la URL o fallan las comprobaciones de abajo
$max = 50;

// Para leer el maximo por url se escribe una query string (lo que va después del archivo, empieza con ?)
// Se lee max en la URL y se escribe como ?max=n
// si quisieran pasarse más parámetros tendrían que separarse con &
if (isset($_GET['max']) && is_numeric($_GET['max'])) { // fuerza que se escriba el parametro max y que contenga un entero
    $max = (int) $_GET['max']; // lo mete en el maximo
}

echo "Números pares del 0 al $max<br>";
echo "<ul>";
for ($i = 0; $i <= $max; $i += 2) {
    echo "<li>$i</li>";
}
echo "</ul>";
?>