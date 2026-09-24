<?php
$n=6;
$res=1;
for($i=1; $i<=$n; $i++){
    $res*=$i;
}
echo"El factorial de ".$n." es: ".$res."."; // iterativo

$i=1;
while($i<=$n){
    $res*=$i--;
}

echo"El factorial de ".$n." es: ".$res."."; // recursivo
?>