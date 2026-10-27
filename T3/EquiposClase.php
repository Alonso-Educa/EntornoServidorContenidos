<?php

class Partido
{
    private string $equipo1;
    private string $equipo2;
    private string $resultado;
    private int $p1;
    private int $p2;
    private int $roja;
    private int $amarilla;
    private int $penalti;

    public function __construct($eq1, $eq2, $p1, $p2, $roj, $am, $pen)
    {
        $this->equipo1 = $eq1;
        $this->equipo2 = $eq2;
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->roja = $roj;
        $this->amarilla = $am;
        $this->penalti = $pen;
    }



    /**
     * Get the value of equipo1
     */
    public function getEquipo1(): string
    {
        return $this->equipo1;
    }

    /**
     * Set the value of equipo1
     */
    public function setEquipo1(string $equipo1): self
    {
        $this->equipo1 = $equipo1;

        return $this;
    }

    /**
     * Get the value of equipo2
     */
    public function getEquipo2(): string
    {
        return $this->equipo2;
    }

    /**
     * Set the value of equipo2
     */
    public function setEquipo2(string $equipo2): self
    {
        $this->equipo2 = $equipo2;

        return $this;
    }

    /**
     * Get the value of resultado
     */
    public function getResultado(): string
    {
        return $this->resultado;
    }

    /**
     * Set the value of resultado
     */
    public function setResultado(string $resultado): self
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get the value of p1
     */
    public function getP1(): int
    {
        return $this->p1;
    }

    /**
     * Set the value of p1
     */
    public function setP1(int $p1): self
    {
        $this->p1 = $p1;

        return $this;
    }

    /**
     * Get the value of p2
     */
    public function getP2(): int
    {
        return $this->p2;
    }

    /**
     * Set the value of p2
     */
    public function setP2(int $p2): self
    {
        $this->p2 = $p2;

        return $this;
    }

    /**
     * Get the value of roja
     */
    public function getRoja(): int
    {
        return $this->roja;
    }

    /**
     * Set the value of roja
     */
    public function setRoja(int $roja): self
    {
        $this->roja = $roja;

        return $this;
    }

    /**
     * Get the value of amarilla
     */
    public function getAmarilla(): int
    {
        return $this->amarilla;
    }

    /**
     * Set the value of amarilla
     */
    public function setAmarilla(int $amarilla): self
    {
        $this->amarilla = $amarilla;

        return $this;
    }

    /**
     * Get the value of penalti
     */
    public function getPenalti(): int
    {
        return $this->penalti;
    }

    /**
     * Set the value of penalti
     */
    public function setPenalti(int $penalti): self
    {
        $this->penalti = $penalti;

        return $this;
    }
}

// imprimir tabla de clasificacion
function imprimirClasificacionClase($a)
{
    echo "<table border='1'>";
    echo "<th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th>";

    foreach ($a as $clave => $valor) {
        echo "<tr>";
        echo "<th>$clave</th>";
        $puntos = 0;
        $g_favor = 0;
        $g_contra = 0;

        foreach ($valor as $partido) {
            if ($partido != "") {

                // calcular puntos
                if ($partido->getP1() > $partido->getP2()) {
                    $puntos += 2;
                } else if ($partido->getP1() == $partido->getP2()) {
                    $puntos++;
                }

                // calcular goles a favor y en contra
                $g_favor += $partido->getP1();
                $g_contra += $partido->getP2();
            }
        }

        echo "<td>$puntos</td>";
        echo "<td>$g_favor</td>";
        echo "<td>$g_contra</td>";

        echo "</tr>";
    }
    echo "</table>";
}

?>