<?php

// Copia la clase del ejercicio anterior y modifícala. 
// Cambia la constante por una variable estática sueldoTope, 
// de manera que mediante getter/setter puedas modificar su valor.

class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos;
    private static int $sueldoTope = 1500;

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

    public static function getSueldoTope(): int
    {
        return self::$sueldoTope;
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

    public static function setSueldoTope(int $sueldoTope): void
    {
        self::$sueldoTope = $sueldoTope;
    }

    public function getDatosCompleto(): string
    {
        return "Empleado: " . $this->nombre . " " . $this->apellidos . ", sueldo: " . $this->sueldo . "<br>";
    }

    public function debePagarImpuestos(): bool
    {
        if ($this->sueldo > self::$sueldoTope) {
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

// $e = new Empleado("Juan","Pepe");
// $e2 = new Empleado("Alonso","Rogado",50000);
// echo $e->getDatosCompleto();
// echo $e2->getDatosCompleto();
// echo $e2->getNombre()." debe pagar impuestos: ";
// var_dump($e2->debePagarImpuestos());
// echo"<br>";
// Empleado::setSueldoTope(100000);
// echo $e2->getNombre()." debe pagar impuestos: ";
// var_dump($e2->debePagarImpuestos());
// echo"<br>";
?>