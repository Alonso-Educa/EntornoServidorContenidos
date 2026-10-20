<?php

// 1 1 1 1
// 1 2 3 4
// 1 3 6 10
// 1 4 10 20

$n = $_POST["num"];
$cont = 0;
echo "<table border = '1'>";
for ($i = 0; $i < $n; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $n; $j++) {
        echo ($i == 0 || $j == 0) ? "<td>1</td>" : "<td>".($cont+$j)."</td>";
    }
    $cont++;
    echo "</tr>";
}
echo "</table>";