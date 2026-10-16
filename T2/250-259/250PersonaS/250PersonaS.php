<?php

// Copia las clases del ejercicio anterior y modifícalas.

// Añade métodos que muestren con__toString(), todas las propiedades de las clases Persona y Empleado, 
// reutilizando en Empleado el método de la clase padre.  function public __toString(): string

include_once('../../240-249/249PersonaE/249PersonaE.php');

// ya está todo hecho en las clases anteriores
class PersonaS extends PersonaE
{
    public function __construct(string $nom, string $ape, string $fec, float $sal = 0, array $tel = [])
    {
        parent::__construct($nom, $ape, $fec, $sal, $tel);
    }
}