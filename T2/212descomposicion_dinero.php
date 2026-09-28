<?php

$dinero2 = 19888;
$dinero = $dinero2;
$i = 0;
$billetes = [0, 0, 0, 0, 0, 0, 0, 0, 0];
$billetestxt = [500, 200, 100, 50, 20, 10, 5, 2, 1];
while ($dinero != 0) {
    while ($dinero >= 500) {
        $dinero -= 500;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 200) {
        $dinero -= 200;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 100) {
        $dinero -= 100;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 50) {
        $dinero -= 50;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 20) {
        $dinero -= 20;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 10) {
        $dinero -= 10;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 5) {
        $dinero -= 5;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 2) {
        $dinero -= 2;
        $billetes[$i]++;
    }
    $i++;
    while ($dinero >= 1) {
        $dinero -= 1;
        $billetes[$i]++;
    }
}
echo "Tienes $dinero2 €. Esto se puede dividir en:<br/>";
for ($i = 0; $i < count($billetes); $i++) {
    echo "Se divide en ".$billetes[$i]." billetes de ".$billetestxt[$i].".<br/>";
}
?>