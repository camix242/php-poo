<?php
require_once("Interfaces/IEntregarTarea.php");

class Estudiante extends Persona implements IEntregarTarea
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

   /**
   * @param $profe
   * @return string
   */
    function entregarTarea($profe) {
      return 'Estudiante ' .$this->getNombre().'('.$this->getCodEstudiante().') entrega tarea a la profesora '.$profe->getNombre().PHP_EOL;
    }

  /**
   * @return string
   */
    public function revisarNota()
    {
      return "Estudiante revisa nota de la tarea".PHP_EOL;
    }

  /**
   * @return string
   */
    public function consultarDatos()
    {
      return PHP_EOL."Estudiante-> ".parent::consultarDatos(). "| Cod: ".$this->getCodEstudiante(); // TODO: Change the autogenerated stub
    }

  /**
   * Sobre escribe el método cargarDatos de persona y agrega el atributo correpondiente al estudiante
   * @param $nombre
   * @param $apellido
   * @param $fechaNacimiento
   * @param $correo
   * @param int $codEstudiante
   */
    public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo, $codEstudiante = 0)
    {
      parent::cargarDatos($nombre, $apellido, $fechaNacimiento, $correo); // TODO: Change the autogenerated stub
      $this->setCodEstudiante($codEstudiante);
    }
}
