<?php

// Carlos quiere saber si va a aprobar una asignatura. El profesor ha puesto 
// dos formas distintas de aprobar, y con que cumpla una de las dos ya le vale:

// Primera forma sacar un 5 o más en la nota y tener un 80% o más de asistencia a clase.

// Segunda forma sacar un 4 o más en la nota y, además, 
// que no sea verdad que haya faltado a la recuperación (o sea, que sí se haya presentado).

// Carlos tiene un 4 de nota, un 90% de asistencia y no ha faltado a la recuperación (falta = 0). 
// Con estos datos, comprueba si Carlos consigue aprobar la asignatura analizando el resultado de la expresión lógica del código.

$nota = 4;
$asistencia = 0.9;
$recuperacion = true;

if ($nota >= 5 && $asistencia >= 0.8) {
    echo "Carlos ha aprobado la asignatura por la primera forma.";
} else if ($nota >= 4 && $recuperacion = true) {
    echo "Carlos ha aprobado la asignatura por la segunda forma.";
} else {
    echo "Carlos ha suspendido la asignatura.";
}

?>