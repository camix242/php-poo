<?php
require_once("Classes/Persona.php");
require_once("Classes/Estudiante.php");
require_once("Classes/Profesor.php");
require_once("Classes/PadreFamilia.php");
require_once("Classes/Notificacion.php");


// Instanciamos los distintos actores

//Profesor
$profesora = new Profesor();
$profesora->cargarDatos("Sara", "Beltrán", "1970-08-30", "sara@correo.com", 123);

//Estudiante
$estudiante = new Estudiante();
$estudiante->cargarDatos("Juan", "Perez", "2000-07-23", "juan@correo.com", 2020203456);

//Padre de familia
$padre = new PadreFamilia();
$padre->cargarDatos("Alberto", "Soler", "1974-07-02", "alberto@correo.com", 234253);


echo "---Datos personas instaciadas---";
echo $profesora->consultarDatos();
echo $estudiante->consultarDatos();
echo $padre->consultarDatos();
echo PHP_EOL;
echo PHP_EOL;

//**********************************++
// A continuación ejecutamos la rutina de asignación, entrega, calificación y revisión de tarea.
//**********************************++

//Profesor asigna tarea
echo $profesora->asignarTarea($estudiante);
$notificaAsginacion = new Notificacion();
$mensaje = "Apreciaso estudiantes ".$estudiante->getNombre()."se le ha asignado una nueva tarea por parte de la profesora ". $profesora->getNombre();
echo $notificaAsginacion->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
echo PHP_EOL;

//Alumno entrega tarea
echo $estudiante->entregarTarea($profesora);
$notificaEntrega = new Notificacion();
$mensaje = "Apreciaso profesor(a)". $profesora->getNombre()." el estudiante". $estudiante->getNombre()." entregó la tarpea. Favor ingresar a la plataforma para realizar calificación.";
echo $notificaEntrega->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
echo PHP_EOL;

//El profesor califica la tarea
echo $profesora->calificaTarea($estudiante);
$notificaCalificacion = new Notificacion();
$mensaje = "Apreciaso estudiantes se le ha calificado la tarea por parte de la profesora ". $profesora->getNombre().". Por favor revisar nota en la plataforma";
echo $notificaCalificacion->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
echo PHP_EOL;

//Padre y estudiante revisan nota dela tarea
echo $estudiante->revisarNota();
echo $padre->revisarNota();
echo PHP_EOL;
