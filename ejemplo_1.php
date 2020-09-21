<?php
require_once("Classes/Persona.php");
require_once("Classes/Estudiante.php");
require_once("Classes/Profesor.php");

$sara = new Profesor();
$sara->modificarDatos("Sara", "Beltrán", "2000-08-30");
//$sara->setNombre("Sara");
//$sara->setApellido("Beltrán");
//$sara->setFechaNacimiento("2000-08-30");


//$camilo = new Estudiante("Camilo", "Beltrán", "1988-08-30", "2020201212");

echo $sara->consultarDatos();
//echo $camilo->entregarTarea();
