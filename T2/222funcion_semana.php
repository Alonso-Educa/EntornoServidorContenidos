<?php
function dia_cine()
{
    $n = rand(1, 7);
    $dia = "lunes";

    switch ($n) {
        case 1:
            $dia = "lunes";
            break;
        case 2:
            $dia = "martes";
            break;
        case 3:
            $dia = "miercoles";
            break;
        case 4:
            $dia = "jueves";
            break;
        case 5:
            $dia = "viernes";
            break;
        case 6:
            $dia = "sabado";
            break;
        case 7:
            $dia = "domingo";
            break;
    }

    return $dia;
}

echo "Esta semana voy a ir al cine el ".dia_cine();
?>