<?php

class Producto
{
    private string $nombre;
    private string $nombreCorto;
    private string $codigo;
    private string $pvp;

    // public function __construct($codigo, $nombre, $nombreCorto, $pvp)
    // {
    //     $this->codigo = $codigo;
    //     $this->nombre = $nombre;
    //     $this->nombreCorto = $nombreCorto;
    //     $this->pvp = $pvp;
    // }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombreCorto
     */
    public function getNombreCorto(): string
    {
        return $this->nombreCorto;
    }

    /**
     * Set the value of nombreCorto
     */
    public function setNombreCorto(string $nombreCorto): self
    {
        $this->nombreCorto = $nombreCorto;

        return $this;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     */
    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of pvp
     */
    public function getPvp(): string
    {
        return $this->pvp;
    }

    /**
     * Set the value of pvp
     */
    public function setPvp(string $pvp): self
    {
        $this->pvp = $pvp;

        return $this;
    }

    public function mostrarResumen()
    {
        echo "<p>Prod:" . $this->codigo . "</p>";
    }
}

class Tv extends Producto
{
    private string $pulgadas;
    private string $tecnologia;


    // public function __construct($pulgadas, $tecnologia){
    //     $this->pulgadas=$pulgadas;
    //     $this->tecnologia=$tecnologia;
    // }
    /**
     * Get the value of tecnologia
     */
    public function getTecnologia(): string
    {
        return $this->tecnologia;
    }

    /**
     * Set the value of tecnologia
     */
    public function setTecnologia(string $tecnologia): self
    {
        $this->tecnologia = $tecnologia;

        return $this;
    }

    /**
     * Get the value of pulgadas
     */
    public function getPulgadas(): string
    {
        return $this->pulgadas;
    }

    /**
     * Set the value of pulgadas
     */
    public function setPulgadas(string $pulgadas): self
    {
        $this->pulgadas = $pulgadas;

        return $this;
    }
}

$t = new Tv();
$t->setCodigo(1);
$t->setPulgadas("33");
if ($t instanceof Producto) {
    echo $t->mostrarResumen();
}
$padre = get_parent_class($t);
echo "La clase padre es: " . $padre;
$objetoPadre = new $padre;
$objetoPadre->setCodigo('2');
echo $objetoPadre->mostrarResumen();
if (is_subclass_of($t, 'Producto')) {
    echo "Soy un hijo de Producto";
}
?>