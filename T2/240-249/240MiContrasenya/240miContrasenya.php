<?php

// crea una función que a partir de un tamaño y unas necesidades (contiene mayúsculas, 
// carácter numérico, especial...) genere una contraseña. Este programa también 
// permite escribirla y comprueba si cumple los criterios.
function miContrasenya($tam, $mayus, $num, $esp, $contrasenya = '')
{
    if ($contrasenya == '') {
        if ($tam > 0) {
            $a = [];
            $simbolos = 'ºª\\!|\"@·#$~%&¬/()=\'?¿¡+^-_';
            for ($i = 0; $i < $tam; $i++) {
                if ($esp) {
                    $tipo = rand(0, 2);
                    // si hay numeros
                    if ($tipo == 0 && $num) {
                        array_push($a, rand(0, 9));
                        // si hay simbolos
                    } elseif ($tipo == 2) {
                        array_push($a, $simbolos[rand(0, strlen($simbolos) - 1)]);
                        // el resto son letras (tipo 1, o tipo 0 cuando no se piden números)
                    } else {
                        // si hay mayusculas
                        if ($mayus) {
                            $case = rand(0, 1);
                            if ($case == 0) {
                                array_push($a, chr(rand(ord('a'), ord('z'))));
                            } else {
                                array_push($a, chr(rand(ord('A'), ord('Z'))));
                            }
                        } else {
                            array_push($a, chr(rand(ord('a'), ord('z'))));
                        }
                    }
                    // si no hay caracteres especiales
                    // si hay numeros
                } elseif ($num) {
                    $tipo = rand(0, 1);
                    if ($tipo == 0) {
                        array_push($a, rand(0, 9));
                    } else {
                        // si hay mayusculas
                        if ($mayus) {
                            $case = rand(0, 1);
                            if ($case == 0) {
                                array_push($a, chr(rand(ord('a'), ord('z'))));
                            } else {
                                array_push($a, chr(rand(ord('A'), ord('Z'))));
                            }
                        } else {
                            array_push($a, chr(rand(ord('a'), ord('z'))));
                        }
                    }
                    // lo msimo de antes
                } else {
                    if ($mayus) {
                        $case = rand(0, 1);
                        if ($case == 0) {
                            array_push($a, chr(rand(ord('a'), ord('z'))));
                        } else {
                            array_push($a, chr(rand(ord('A'), ord('Z'))));
                        }
                    } else {
                        array_push($a, chr(rand(ord('a'), ord('z'))));
                    }
                }
            }
            return join($a);
        }
        return false;
    } else {
        if (strlen($contrasenya) != $tam) {
            return false;
        }

        // las validaciones por regex se hacen de la misma forma que en js
        $tieneMayusculas = preg_match('/[A-Z]/', $contrasenya) === 1; // comprueba si ahy alguna mayuscula
        $tieneNumeros = preg_match('/[0-9]/', $contrasenya) === 1; // compreba si hay algunn numero
        $tieneCaracterEsp = preg_match('/[^a-zA-Z0-9]/', $contrasenya) === 1; // comprueba si hay algun caracter que no sea numero o letra

        // Se comprueba el boolean y si el contenido de la contraseña coinciden
        return $mayus === $tieneMayusculas
            && $num === $tieneNumeros
            && $esp === $tieneCaracterEsp;
    }
}

?>