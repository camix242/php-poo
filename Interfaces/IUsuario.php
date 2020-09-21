<?php


interface IUsuario
{
  public function consultarDatos();
  public function modificarDatos($nombre, $apellido, $fechaNacimiento);
}
