<?php
require_once("Classes/Persona.php");
require_once("Classes/Estudiante.php");
require_once("Classes/Profesor.php");
require_once("Classes/PadreFamilia.php");
require_once("Classes/Notificacion.php");


// Instanciamos los distintos actores

//Profesor
$profesora = new Profesor();
$profesora->setNombre("Sara");
$profesora->setApellido("Beltrán");
$profesora->setFechaNacimiento("1970-08-30");
$profesora->setCorreo("sara@correo.com");
$profesora->setProfesorId(123);

//Estudiante
$estudiante = new Estudiante();
$estudiante->setNombre("Juan");
$estudiante->setApellido("Perez");
$estudiante->setFechaNacimiento("2000-07-23");
$estudiante->setCorreo("juan@correo.com");
$estudiante->setCodEstudiante(2020203456);


//Padre de familia
$padre = new PadreFamilia();
$padre->setNombre("Alberto");
$padre->setApellido("Solar");
$padre->setFechaNacimiento("1974-07-02");
$padre->setCorreo("alberto@correo.com");
$padre->setPadreId(234253);

echo "---Datos personas instaciadas---";
echo $estudiante->consultarDatos();
echo $profesora->consultarDatos();
echo $padre->consultarDatos();
echo PHP_EOL;
echo PHP_EOL;

//**********************************++
// A continuación ejecutamos la rutina de asignación, entrega, calificación y revisión de tarea.
//**********************************++

//Profesor asigna tarea
echo $profesora->asignarTarea();
$notificaAsginacion = new Notificacion();
$mensaje = "Apreciaso estudiantes se le ha asignado una nueva tarea por parte de la profesora ". $profesora->getNombre();
echo $notificaAsginacion->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
echo PHP_EOL;

//Alumno entrega tarea
echo $estudiante->entregarTarea();
$notificaEntrega = new Notificacion();
$mensaje = "Apreciaso profesor(a)". $profesora->getNombre()." el estudiante". $estudiante->getNombre()." entregó la tarpea. Favor ingresar a la plataforma para realizar calificación.";
echo $notificaEntrega->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
echo PHP_EOL;

//El profesor califica la tarea
echo $profesora->calificaTarea();
$notificaCalificacion = new Notificacion();
$mensaje = "Apreciaso estudiantes se le ha calificado la tarea por parte de la profesora ". $profesora->getNombre().". Por favor revisar nota en la plataforma";
echo $notificaCalificacion->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
echo PHP_EOL;

//Padre y estudiante revisan nota dela tarea
echo $estudiante->revisarNota();
echo $padre->revisarNota();
echo PHP_EOL;
