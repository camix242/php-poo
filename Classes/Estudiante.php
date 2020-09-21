<?php
require_once("Interfaces/IEntregarTarea.php");
require_once("Interfaces/IRevisarNota.php");

class Estudiante extends Persona implements IEntregarTarea, IRevisarNota
{
    private $codEstudiante;

    /**
     * @return mixed
     */
    public function getCodEstudiante()
    {
      return $this->codEstudiante;
    }

    /**
     * @param mixed $codEstudiante
     */
    public function setCodEstudiante($codEstudiante)
    {
      $this->codEstudiante = $codEstudiante;
    }

    function entregarTarea() {
      return 'Estudiante ' .$this->getNombre().'('.$this->getCodEstudiante().') entrega tarea';
    }

    public function revisarNota()
    {
      return "Estudiante revisar nota de la tarea";
    }

  /**
     * Permite ver los datos del estudiante como string, cuando al llamarlo con echo
     * @return string
     */
    public function __toString()
    {
        return parent::__toString() ." ". $this->getCodEstudiante(); // TODO: Change the autogenerated stub
    }
}
