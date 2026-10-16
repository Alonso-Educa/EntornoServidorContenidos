<?php

// Partiendo del ejercicio anterior, modifica. Crea una clase Empleado que herede de Persona, 
// de manera que Persona contenga el nombre y los apellidos, 
// y en Empleado quede el salario y los teléfonos.

include_once('../../PersonaDate.php');

class Empleado248 extends Persona
{
    private float $salario;
    private array $telefonos;
    private const SUELDO_TOPE = 1500;

    /**
     * Summary of __construct
     * @param string $nom
     * @param string $ape
     * @param string $fec
     * @param float $sal
     * @param array $tel
     */
    public function __construct(string $nom, string $ape, string $fec, float $sal = 0, array $tel = [])
    {
        parent::__construct($nom, $ape, $fec);
        $this->salario = $sal;
        $this->telefonos = $tel;
    }

    /**
     * Get the value of salario
     */
    public function getSalario(): float
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     */
    public function setSalario(float $salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get the value of telefonos
     */
    public function getTelefonos(): array
    {
        return $this->telefonos;
    }

    /**
     * Set the value of telefonos
     */
    public function setTelefonos(array $telefonos): self
    {
        $this->telefonos = $telefonos;

        return $this;
    }

    public function debePagarImpuestos(): bool
    {
        if ($this->salario > self::SUELDO_TOPE) {
            return true;
        } else {
            return false;
        }
    }

    public function __tostring()
    {
        return parent::__toString() . ", salario: " . $this->salario . ", telefonos: [" . implode(", ", $this->telefonos) . "]";
    }
}

?>