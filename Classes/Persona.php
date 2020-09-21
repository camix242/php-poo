<?php
require_once("Interfaces/IUsuario.php");

class Persona implements IUsuario
{
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $correo;

    public function ingresar()
    {
      // TODO: Implement ingresar() method.
      return "Persona ingresa al sistema";
    }

    public function salir()
    {
      // TODO: Implement salir() method.
      return "Persona sale del sistema";
    }

  /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
      $this->nombre = $nombre;
    }

    /**
    * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
      $this->apellido = $apellido;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
      $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
      return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
      return $this->apellido;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
      return $this->fechaNacimiento;
    }


    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
      $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
      return $this->correo;
    }

    /**
     * Permite consultar los datos básicos de uan presona
     * @return string
     */
    public function consultarDatos ()
    {
      $datosPersona = "Nombre: ". $this->getNombre()." | ";
      $datosPersona .= "Apellido: ". $this->getApellido()." | ";
      $datosPersona .=" Fecha Nacimiento: ". $this->getFechaNacimiento()." | ";
      $datosPersona .=" Correo: ". $this->getCorreo()." | ";

      return $datosPersona;
    }

    /**
     * Permite modificar los datos básicos de la persona
     * @param $nombre
     * @param $apellido
     * @param $fechaNacimiento
     */
    public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo)
    {
      $this->setFechaNacimiento($fechaNacimiento);
      $this->setApellido($apellido);
      $this->setNombre($nombre);
      $this->setCorreo(correo);
    }

    public function __toString ()
    {
      return $this->getNombre() ." ". $this->getApellido(). " ". $this->setFechaNacimiento();
    }

}
