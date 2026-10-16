<?php

// Copia las clases del ejercicio anterior y modifícalas.

// Añade en Persona un atributo edad
// Modifica el código para mostrar y/o editar la edad cuando sea necesario.
// A la hora de saber si un empleado debe pagar impuestos, lo hará siempre y cuando tenga más de 21 años y dependa del valor de su sueldo (ya hecho).

include_once('../248Persona/248Persona.php');

class PersonaE extends Empleado248
{
    private int $edad;
    private const ZONA = 'Europe/Madrid';

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
        parent::__construct($nom, $ape, $fec, $sal, $tel);
        $this->edad = $this->calcularEdad($fec);
    }

    private function calcularEdad(string $fec): int
    {
        $zona = new DateTimeZone(self::ZONA);
        $hoy = new DateTime('now', $zona);
        $fecNacimiento = new DateTime($fec, $zona);
        $intervalo = $hoy->diff($fecNacimiento);

        return intval($intervalo->format('%Y'));
    }

    /**
     * Get the value of edad
     */
    public function getEdad(): int
    {
        return $this->edad;
    }

    public function setFecNacimiento($fec)
    {
        parent::setFecNacimiento($fec);
        $this->setEdad($this->getTotalAnyos());
    }

    /**
     * Set the value of edad
     */
    private function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function __tostring()
    {
        return parent::__toString() . ", edad: " . $this->edad;
    }
}
?>