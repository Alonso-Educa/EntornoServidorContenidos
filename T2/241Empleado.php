<?php

// crea una clase Empleado con su nombre, apellidos y sueldo. Encapsula las propiedades mediante getters/setters y añade métodos para:

//     Obtener datos completos → getDatosCompleto(): string
//     Que devuelva un booleano indicando si debe o no pagar impuestos (se pagan cuando el sueldo es superior a 1500€) → debePagarImpuestos(): bool

class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;

    // Constructor
    public function __construct(string $nom, string $ape, float $sue)
    {
        $this->nombre = ucfirst($nom);
        $this->apellidos = ucfirst($ape);
        $this->sueldo = $sue;
    }

    // Getters
    public function getNombre(): string
    {
        return ucfirst($this->nombre);
    }

    public function getApellidos(): string
    {
        return ucfirst($this->apellidos);
    }

    public function getSueldo(): float
    {
        return $this->sueldo;
    }


    // Setters
    public function setNombre(string $nom)
    {
        $this->nombre = ucfirst($nom);
    }

    public function setApellidos(string $ape)
    {
        $this->apellidos = ucfirst($ape);
    }

    public function setSueldo(float $sue)
    {
        $this->sueldo = $sue;
    }

    public function getDatosCompleto(): string
    {
        return "Empleado: " . $this->nombre . " " . $this->apellidos . ", sueldo: " . $this->sueldo . "<br>";
    }

    public function debePagarImpuestos(): bool
    {
        if($this->sueldo>1500){
            return true;
        }else{
            return false;
        } 
    }
}

$e1= new Empleado("Juan", "Pepe", 1667);
$e2= new Empleado("Alonso", "Rogado", 100);

echo $e1->getDatosCompleto();
echo $e2->getDatosCompleto();

echo $e1->getNombre()." debe pagar impuestos: ";
var_dump($e1->debePagarImpuestos());
echo"<br>";

echo $e2->getNombre()." debe pagar impuestos: ";
var_dump($e2->debePagarImpuestos());
echo"<br>";
?>