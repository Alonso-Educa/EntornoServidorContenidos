<?php

// copia la clase del ejercicio anterior y modifícala. Añade una propiedad privada 
// que almacene un array de números de teléfonos. Añade los siguientes métodos:

//     public function anadirTelefono(int $telefono) : void → Añade un teléfono al array
//     public function listarTelefonos(): string → Muestra los teléfonos separados por comas
//     public function vaciarTelefonos(): void → Elimina todos los teléfonos

class Empleado
{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private Array $telefonos;

    // Constructor
    public function __construct(string $nom, string $ape, float $sue)
    {
        $this->nombre = ucfirst($nom);
        $this->apellidos = ucfirst($ape);
        $this->sueldo = $sue;
        $this->telefonos=[];
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

$e= new Empleado("Juan", "Pepe", 1667);

$e->anadirTelefono(123456789);
$e->anadirTelefono(234567890);
$e->anadirTelefono(345678901);

echo "Telefonos de ".$e->getNombre().": ".$e->listarTelefonos()."<br>";

$e->vaciarTelefonos();
echo "Telefonos de ".$e->getNombre().": ".$e->listarTelefonos()."<br>";
?>