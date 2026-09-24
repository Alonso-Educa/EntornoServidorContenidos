<?php

$a=1; $b=2; $c=3;
$raiz=sqrt($b*$b)-4*$a*$c;
if($raiz==NaN){

}
$opM=(-$b+sqrt(($b*$b)-4*$a*$c))/2*$a;
$opm=(-$b-sqrt(($b*$b)-4*$a*$c))/2*$a;

echo"La ecuación tiene como solución: $opM y $opm.";
?>