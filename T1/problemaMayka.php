<?php 
$a=12; $b=7;

if(($a/2 + $b)>=13){
    echo"La mitad de $a + $b es mayor o igual 13<br>";
}else{
    echo"La mitad de $a + $b no es mayor o igual a 13?<br>";
}

if($a%$b!=0){
    echo"Al dividir $a/$b si tiene resto<br>";
}else{
    echo"Al dividir $a/$b no tiene resto<br>";
}

if((-$b===7)==0){
    echo'$b es igual a 7<br>';
}else{
    echo'$b no es igual a 7<br>';
}

$c = (($a/2 + $b)>=13) && ($a%$b!=0) && ((-$b===7)==0);
if($c==1){
    echo "El valor de \$c = true";
}else{
    echo "El valor de \$c = false";
}

?>