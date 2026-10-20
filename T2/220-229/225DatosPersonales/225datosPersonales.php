<?php

function crearTabla($a){
    echo"<table border='1'>";
    foreach($a as $nombre => $valor){
        echo"<tr>";
        echo"<th>".ucfirst($nombre)."</th><td>$valor</td>";
        echo"</tr>";
    }
    echo"</table>";
}