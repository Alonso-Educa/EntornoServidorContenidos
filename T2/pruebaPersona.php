<?php

include_once 'Persona.php';
// $p = new Persona();

// // No se puede acceder al objeto antes de haberlo inicializado
// // echo $p->getNombre()." ".$p->getApellido();
// // echo $p->imprimirDatos();

// echo "<br>";
// $p->setNombre("Juan");
// $p->setApellido("Pepe");

// echo $p->imprimirDatos();

$p2=new Persona("lola","Lopez",13);
echo $p2->imprimirDatos()."<br>";
echo $p2;
var_dump($p2->setNacimiento(2000)); // 26 años
echo "<br>";
var_dump($p2->setNacimiento(2020)); // 6 años
echo "<br>";
echo $p2->getNacimiento();


$serializedPersona=serialize($p2);
echo "<br>Persona serializada: ";
echo $serializedPersona;

$unserializedPersona=unserialize($serializedPersona);
echo "<br>Persona unserializada: ";
echo $unserializedPersona;
?>