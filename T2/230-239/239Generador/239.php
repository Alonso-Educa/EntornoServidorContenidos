<?php

include_once('239generador.php');

for ($i = 0; $i < 5; $i++) {
    echo "Letra minúscula aleatoria: " . generador(false) . "<br>";
}
echo "<br>";
for ($i = 0; $i < 5; $i++) {
    echo "Letra mayúscula aleatoria: " . generador(true) . "<br>";
}
echo "<br>";
for ($i = 0; $i < 5; $i++) {
    echo "Letra minúscula aleatoria: " . generador() . "<br>";
}

?>