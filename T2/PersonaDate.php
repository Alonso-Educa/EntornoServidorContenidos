<?php

// orden: atributos, constructor, getters/setters, metodos
class Persona
{
    // Atributos
    private string $nombre;
    private string $apellido;
    private DateTime $fecNacimiento;
    private const ZONA = 'Europe/Madrid';

    // Constructor
    public function __construct(string $nom, string $ape, string $fecNacimiento)
    {
        $this->nombre = ucwords($nom);
        $this->apellido = ucwords($ape);
        $this->fecNacimiento = new DateTime($fecNacimiento);
    }

    // Getters
    public function getNombre(): string
    {
        return ucwords($this->nombre);
    }

    public function getApellido(): string
    {
        return ucwords($this->apellido);
    }

    public function getFecNacimiento(): string
    {
        return $this->fecNacimiento->format("Y-m-d");
    }

    // Setters
    public function setNombre(string $nom)
    {
        $this->nombre = ucfirst($nom);
    }

    public function setApellido(string $ape)
    {
        $this->apellido = ucfirst($ape);
    }

    public function setFecNacimiento(string $fecNacimiento)
    {
        $zona = new DateTimeZone(self::ZONA);
        $hoy = new DateTime('now', $zona);
        $this->fecNacimiento = new DateTime($fecNacimiento, $zona);
        $intervalo = $hoy->diff($this->fecNacimiento);

        if (intval($intervalo->format('%Y')) < 18) {
            return "Es menor de edad";
        } else {
            return "Es mayor de edad";
        }
    }

    public function getTotalAnyos(): string
    {
        $zona = new DateTimeZone(self::ZONA);
        $hoy = new DateTime('now', $zona);
        $intervalo = $hoy->diff($this->fecNacimiento);
        return $intervalo->format('%Y años');
    }

    // Metodos
    public function imprimirDatos()
    {
        return "Datos: " . $this->nombre . " " . $this->apellido;
    }

    public function __toString()
    {
        return "Persona: " . $this->nombre . " " . $this->apellido . ", fecha de nacimiento: " . $this->fecNacimiento->format("Y-m-d") . ", edad: " . $this->getTotalAnyos();
    }
}

// $p1 = new Persona("Juan", "pepe", "2006-9-20");
// echo $p1."<br>";
// echo $p1->getTotalAnyos() . "<br>";
// echo $p1->setFecNacimiento("2020-9-16") . "<br>";
// echo $p1->getTotalAnyos() . "<br>";
// echo $p1."<br>";

// $p2 = new Persona("alonso a.", "rogado pastor", "2005-10-22");
// echo "<br>".$p2->imprimirDatos() . "<br>";
// echo $p2;
?>