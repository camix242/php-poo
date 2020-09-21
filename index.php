<?php
require_once("Classes/Persona.php");
require_once("Classes/Estudiante.php");
require_once("Classes/Profesor.php");
require_once("Classes/PadreFamilia.php");

// Instanciamos los distintos actores

//Profesor
$profesora = new Profesor();
$profesora->setNombre("Sara");
$profesora->setApellido("Beltrán");
$profesora->setFechaNacimiento("1970-08-30");
$profesora->setProfesorId(123);

//Estudiante

$estudiante = new Estudiante();
$estudiante->setNombre("Juan");
$estudiante->setApellido("Perez");
$estudiante->setFechaNacimiento("2000-07-23");
$estudiante->setCodEstudiante(2020203456);


//Padre de familia
$padre = new PadreFamilia();
$padre->setNombre("Alberto");
$padre->setApellido("Solar");
$padre->setFechaNacimiento("1974-07-02");
$padre->setPadreId(234253);

echo PHP_EOL;
//Profesor asigna tarea
echo $profesora->asignarTarea();
echo PHP_EOL;
//Alumno entrega tarea
echo $estudiante->entregarTarea();
echo PHP_EOL;
//El profesor califica la tarea
echo $profesora->calificaTarea();
echo PHP_EOL;
//Tanto padre como estudiante pueden reviar la tarea
echo $estudiante->revisarNota();
echo PHP_EOL;
echo $padre->revisarNota();
echo PHP_EOL;
