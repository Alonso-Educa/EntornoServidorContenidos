<?php

// crea una función que permite generar una letra aleatoria, mayúscula o minúscula, dependiendo de lo que yo quiera.
// Por defecto minúscula

// Pendiente de ver si hay que sumar 1 o no al ascii
function generador($b = false)
{
    $n = rand(0, 25);
    if ($b) {
        return chr(ord('a') + $n);
    } else {
        return chr(ord('A') + $n);
    }

}

for($i=0;$i<5;$i++){
    echo "Letra mayúscula aleatoria: ".generador(true)."<br>";
}
echo"<br>";
for($i=0;$i<5;$i++){
    echo "Letra minúscula aleatoria: ".generador(false)."<br>";
}
?>