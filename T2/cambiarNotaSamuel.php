<?php
class Clase
{
    private array $alumnos;

    /**
     * Summary of __construct
     * @param mixed $al
     */
    private function __construct($al)
    {
        $this->alumnos = $al;
    }

    /**
     * Get the value of alumnos
     */
    public function getAlumnos(): array
    {
        return $this->alumnos;
    }

    /**
     * Set the value of alumnos
     */
    public function setAlumnos(array $alumnos): self
    {
        $this->alumnos = $alumnos;

        return $this;
    }

    public function imprimirDatos(){
        print_r($this->alumnos."<br>");
    }

    function cambiarNotaClase()
    {
        foreach ($this->alumnos as $alumno => $valor) {
            if ($alumno !== "Samuel" && $valor > 0) {
                $valor > 1 ? $resta = 1 : $resta = $valor;
                $this->alumnos[$alumno] - 1 < 0 ? $this->alumnos[$alumno] = 0 : $this->alumnos[$alumno]--;
                $this->alumnos["Samuel"] + $resta > 10 ? $this->alumnos["Samuel"] = 10 : $this->alumnos["Samuel"] += $resta;
            }
        }
    }
}

function cambiarNotaFuncion(&$notas)
{
    foreach ($notas as $alumno => $valor) {
        if ($alumno !== "Samuel" && $valor > 0) {
            $valor > 1 ? $resta = 1 : $resta = $valor;
            $notas[$alumno] - 1 < 0 ? $notas[$alumno] = 0 : $notas[$alumno]--;
            $notas["Samuel"] + $resta > 10 ? $notas["Samuel"] = 10 : $notas["Samuel"] += $resta;
        }
    }
}

$notas = array(
    "Samuel" => 1.99,
    "Alberto" => 7,
    "Santiago" => 1,
    "Javier" => 0,
    "Mauro" => 2,
    "Alonso" => 4,
    "Daniel" => 0.5,
    "Mayka" => 9.99,
    "Nicolas" => 0.1,
);
print_r($notas);
cambiarNotaFuncion($notas);
echo "<br>";
print_r($notas);