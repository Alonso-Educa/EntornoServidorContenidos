<?php

// crea una función que a partir de un tamaño, genere una contraseña 
// aleatoria compuesta de letras y dígitos de manera aleatoria.

// se puede hacer rand(0,2) para no calcular numero aleatorio 2 veces
function generaContrasenya($tam)
{
    if ($tam > 0) {
        $a=[];
        for ($i = 0; $i < $tam; $i++) {
            $tipo = rand(0, 1);
            if ($tipo == 0) {
                array_push($a,rand(0,9));
            }else{
                $case=rand(0,1);
                if($case==0){
                    array_push($a,chr(rand(ord('a'),ord('z'))));
                }else{
                    array_push($a,chr(rand(ord('A'),ord('Z'))));
                }
            }
        }
        return join($a);
    }
    return false;
}

?>