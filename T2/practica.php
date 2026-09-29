<?php

$practicas=[];
$practicas["santiago.rival@..."]="cidaut";
// ...
$serbatic=0;
foreach($practicas as $valor){
    if($valor=="serbatic"){
        $serbatic++;
    }
}
echo"$serbatic";