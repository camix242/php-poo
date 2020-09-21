<?php


interface IUsuario
{
  public function consultarDatos();
  public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo, $idPersona = 0);
}
