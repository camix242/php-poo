<?php
require_once("Classes/Persona.php");
require_once("Classes/Estudiante.php");

$sara = new Persona("Sara", "Beltrán", "2000-08-30");

$camilo = new Estudiante("Camilo", "Beltrán", "1988-08-30", "2020201212");
echo $sara;
echo $camilo;