<?php

function busca_capital($pais='')
{
    $lista = array(
        "España" => "Madrid",
        "Portugal" => "Lisboa",
        "Francia" => "Paris",
        "Alemania" => "Berlin",
        "Reino Unido" => "Londres",
        "Roma" => "Italia"
    );

    if($pais == ""){
        var_dump($lista);
        echo"<br>";
    }else{
        if(isset($lista[$pais])){
            echo "La capital de $pais es ".$lista[$pais]."<br>";
        }else{
            echo"El pais introducido, $pais, no está en la lista<br>";
        }
    }
}

busca_capital();
busca_capital("España");
busca_capital("China");
busca_capital("Alemania");
?>