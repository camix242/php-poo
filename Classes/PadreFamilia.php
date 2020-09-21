<?php
require_once("Interfaces/IRevisarNota.php");
class PadreFamilia extends Persona implements IRevisarNota
{
  private $padreId;

  public function revisarNota()
  {
    return "Padre revisar nota de la tarea";
  }

  /**
   * @return mixed
   */
  public function getPadreId()
  {
    return $this->padreId;
  }

  /**
   * @param mixed $padreId
   */
  public function setPadreId($padreId)
  {
    $this->padreId = $padreId;
  }

}
