<?php
$i; $salir=false;
// do{
//     $n=rand(1,6);
//     echo"Ha salido un ".$n.". Intentos restantes: $i</br>";
//     $i--;
// }while($n!=5 && $i>=0);

for($i=10; $i>=0 && !$salir; $i--){
    $n=rand(1,6);
    echo"Ha salido un ".$n.". Intentos restantes: $i</br>";
    if($n==5){$salir=true;}
}

if($n!=5){
    echo"No has conseguido sacar un 5.";
}else{
    echo"Enhorabuena, has sacado un 5.";
}
?>