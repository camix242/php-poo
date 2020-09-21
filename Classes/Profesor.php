<?php

class Profesor extends Persona
{
    private $profesorId;

    /**
     * @param mixed $profesorId
     */
    public function setProfesorId($profesorId)
    {
      $this->profesorId = $profesorId;
    }

    /**
     * @return mixed
     */
    public function getProfesorId()
    {
      return $this->profesorId;
    }

    public function asignarTarea()
    {
      return 'Profesor(a) '.$this->getNombre().'('.$this->getProfesorId().') asigna tarea'.PHP_EOL;
    }

    public function calificaTarea()
    {
      return 'Profesor(a) '.$this->getNombre().'('.$this->getProfesorId().') califica tarea'.PHP_EOL;
    }

    public function consultarDatos()
    {
      return PHP_EOL."Profesor(a)-> ".parent::consultarDatos()." | ID: ". $this->getProfesorId(); // TODO: Change the autogenerated stub
    }
}
