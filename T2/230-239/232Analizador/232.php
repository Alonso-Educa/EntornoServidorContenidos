<?php

include_once('232analizador.php');

$s = "Hola esto es un array de prueba para la funcion .";
analizadorFrase($s);

$s = "Fraselarga espacio 2.";
analizadorFrase($s);

$s = "123";
analizadorFrase($s);

?>