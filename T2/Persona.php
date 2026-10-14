<?php

// orden: atributos, constructor, getters/setters, metodos
class Persona
{
    // Atributos
    private string $nombre;
    private string $apellido;
    private int $nacimiento;

    const ANYO = 2026;

    // Constructor
    public function __construct(string $nom, string $ape, int $fec)
    {
        $this->nombre = ucfirst($nom);
        $this->apellido = $ape;
        $this->nacimiento = $fec;
    }

    // Getters
    public function getNombre(): string
    {
        return ucfirst($this->nombre);
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getNacimiento(): int
    {
        return $this->nacimiento;
    }

    // Setters
    public function setNombre(string $nom)
    {
        $this->nombre = ucfirst($nom);
    }

    public function setApellido(string $ape)
    {
        $this->apellido = $ape;
    }

    public function setNacimiento(int $nac)
    {
        // $this->edad = $ed;
        // if ($ed < 18) {
        //     return false;
        // } else {
        //     return true;
        // }

        $this->nacimiento = self::ANYO - $nac;

        if (self::ANYO - $nac < 18) {
            return "Es menor de edad";
        } else {
            return "Es mayor de edad";
        }
    }

    // Metodos
    public function imprimirDatos()
    {
        return $this->nombre . " " . $this->apellido;
    }

    public function __toString()
    {
        return "Persona: " . $this->nombre . " " . $this->apellido . ", edad: " . $this->nacimiento . "<br>";
    }
}

?>