<?php


class Estudiante extends Persona
{
    protected $universidadId;

    public function __construct ($nombre, $apellido, $fechaNacimiento, $universidadId) {
        parent::__construct($nombre, $apellido,$fechaNacimiento);
        $this->universidadId = $universidadId;
    }

    public function incibirseCurso () {

    }

    public function __toString()
    {
        return parent::__toString() ." ". $this->universidadId; // TODO: Change the autogenerated stub
    }
}