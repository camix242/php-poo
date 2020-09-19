<?php
require_once("Interfaces/SerHumano.php");

class Persona implements SerHumano
{
    protected $nombre;
    protected $apellido;
    protected $fechaNacimiento;

    public function __construct ($nombre, $apellido, $fechaNacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function pensar()
    {
        // TODO: Implement pensar() method.
    }

    public function respirar()
    {
        // TODO: Implement respirar() method.
    }

    public function __toString ()
    {
        return $this->nombre ." ". $this->apellido;
    }

}