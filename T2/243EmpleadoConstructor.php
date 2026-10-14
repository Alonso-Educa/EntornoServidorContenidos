<?php

// copia la clase del ejercicio anterior y modifícala. 
// Los datos se asignan mediante el constructor. Si el constructor recibe un tercer parámetro, 
// será el sueldo del Empleado. Si no, se le asignará 1000€ como sueldo inicial.

class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos;

    // Constructor
    public function __construct(string $nom, string $ape, float $sue = 1000)
    {
        $this->nombre = ucfirst($nom);
        $this->apellidos = ucfirst($ape);
        $this->sueldo = $sue;
        $this->telefonos = [];
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
        if ($this->sueldo > 1500) {
            return true;
        } else {
            return false;
        }
    }

    public function anadirTelefono(int $telefono): void
    {
        array_push($this->telefonos, $telefono);
    }

    public function listarTelefonos(): string
    {
        return implode(', ', $this->telefonos);
    }

    public function vaciarTelefonos(): void
    {
        $this->telefonos = [];
    }
}

$e = new Empleado("Juan","Pepe");
$e2 = new Empleado("Alonso","Rogado",50000);
echo $e->getDatosCompleto();
echo $e2->getDatosCompleto();

?>