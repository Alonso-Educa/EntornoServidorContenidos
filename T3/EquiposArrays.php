<?php

// imprimir tabla de clasificacion
function imprimirClasificacionArray($a)
{
    echo "<table border='1'>";
    echo "<th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th>";

    foreach ($a as $clave => $valor) {
        echo "<tr>";
        echo "<th>$clave</th>";
        $puntos = 0;
        $g_favor = 0;
        $g_contra = 0;

        foreach ($valor as $partido) {
            if ($partido != "") {

                // calcular puntos
                if ($partido[2] > $partido[3]) {
                    $puntos += 2;
                } else if ($partido[2] == $partido[3]) {
                    $puntos++;
                }

                // calcular goles a favor y en contra
                $g_favor += $partido[2];
                $g_contra += $partido[3];
            }
        }

        echo "<td>$puntos</td>";
        echo "<td>$g_favor</td>";
        echo "<td>$g_contra</td>";

        echo "</tr>";
    }
    echo "</table>";
}

?>