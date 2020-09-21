# Principios Programación Orientada a Objeto

_A través de un proyecto sencillo en PHP pretendemos representar algunos principios de la  programción oritentada a objetos_

### Pre-requisitos 📋

_Para poder realizar la ejecución por consola de los ejemplo es necesario tener una versión de PHP mayor a 7.0._

## Contexto del ejerccio ✒️

Se realiza el desarrollo de una paltaforma educativa donde los distintos actores (Estudiantes, profesores y padres), intervienen con sus respectivas acciones en la dinámica de asignación, entrega y validación de tareas.


## Principios que se aplicaron 🚀

_Se parte de los principios SOLID de los cuales escogimos los siguientes 3:_
* SOLID #1: Principio de responsabilidad única (Single Responsibility Principle (SRP))
* SOLID #2: Principio de abierto para su extensión pero cerrado para su modificación (Open/Closed Principle (OCP))
* SOLID #3: Principio de sustitución de Liskov  (Liskov substitution Principle).

## * Principio de responsabilidad única
Este principio establece que un módulo solo debe tener un motivo para cambiar (Una razón de cambio).
Por lo tanto una clase debería estar destinada a una única responsabilidad y no mezclar la de otros o las que no le incumben a su dominio.

**Implementación:**

Tenemos las clase **Profesor** que tienen los métodos **signarTarea** y **calificarTarea**, también tenemos la clase **Estudiante** con el método **entregarTarea**, se requiere realizar una notificación via correo para avisar al profesor o al estudiante que se relaizó dicha accción según correponda.
Con el fin de respetar el pricipio SOLID #1 hemos creado una clase **Notificacion** en la cual se implementa un método **notificar** que realizar el "envío" del correo, en lugar de realizar la notificación en cada una de las clases que requieren notificar y evitando agregar una razón de cambio adicional.

Implementación sin el principo

```
class Profesor
{
    public function asignarTarea($estudiante)
    {
      $mensaje = "Apreciaso estudiantes ".$estudiante->getNombre()." se le ha asignado una nueva tarea por parte de la profesora ". $this->getNombre();
      $this->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje);
      return 'Profesor(a) '.$this->getNombre().'('.$this->getProfesorId().') asigna tarea a '. $estudiante->getNombre()." ".PHP_EOL;
    }

    public function notificar($correo, $nombreDestinatario, $mensaje) {
      $notificacion = '---Inicia Notificación---'.PHP_EOL;
      $notificacion .= "Correo destino:". $correo.PHP_EOL;
      $notificacion .= "Nombre destinatario:". $nombreDestinatario.PHP_EOL;
      $notificacion .= "Mensaje:". $mensaje."".PHP_EOL;
      $notificacion .= '---Termina Notificación---'.PHP_EOL;

      return $notificacion;
    }
}

//Profesor asigna tarea
$estudiante = new Estudiante();
$profesora = new Profesor();
echo $profesora->asignarTarea($estudiante);
```

Aplicando el principo:

```
class Profesor
{
    public function asignarTarea($estudiante)
    {
      return 'Profesor(a) '.$this->getNombre().'('.$this->getProfesorId().') asigna tarea a '. $estudiante->getNombre()." ".PHP_EOL;
    }
}

class Notificacion
{
  public function notificar($correo, $nombreDestinatario, $mensaje) {
    $notificacion = '---Inicia Notificación---'.PHP_EOL;
    $notificacion .= "Correo destino:". $correo.PHP_EOL;
    $notificacion .= "Nombre destinatario:". $nombreDestinatario.PHP_EOL;
    $notificacion .= "Mensaje:". $mensaje."".PHP_EOL;
    $notificacion .= '---Termina Notificación---'.PHP_EOL;

    return $notificacion;
  }
}

//Profesor asigna tarea
echo $profesora->asignarTarea($estudiante);
$notificaAsginacion = new Notificacion();
$mensaje = "Apreciaso estudiantes ".$estudiante->getNombre()."se le ha asignado una nueva tarea por parte de la profesora ". $profesora->getNombre();
echo $notificaAsginacion->notificar($estudiante->getCorreo(), $estudiante->getNombre(), $mensaje );
```

Del mismo modo se hará  hace para **entregarTarea** y **calificarTarea**.

## *Principio de abierto para su extensión pero cerrado para su modificación
Este principío lo que establece es que una clase debe ser facilmente extendible sin tener que modificarse internamente.

**Implementación:**

En nuestro sistema tenemos la clase **Persona** que nos permitiría instanciar los usuarios que interactuan con la pltaforma, por lo tanto sería posible establecer su diferienzación de la misma clase y a la hora de invocarlos con respecto al atributo **profesorId**, **padreId**
y **profesorId** se asigarian por medio de validaciones y así de esta manera la persona podría tener dicho atributo dependiendo del tipo de usuario.

```
class Persona
{
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $correo;

    private $profesorId;
    private $codEstudiante;
    private $padreId;

    //Supongamos que también están implementados los sets y gets para los atributos

    /**
     * Permite modificar los datos básicos de la persona
     * @param $nombre
     * @param $apellido
     * @param $fechaNacimiento
     * @param $correo
     * @param $identidadPersona
    */
    public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo, $identidadPersona = [ ])
    {
      $this->setFechaNacimiento($fechaNacimiento);
      $this->setApellido($apellido);
      $this->setNombre($nombre);
      $this->setCorreo($correo);

      if ($identidadPersona['tipo'] == 'profesor') {
        $this->setProfesorId($identidadPersona['id']);
      } else if ($identidadPersona['tipo'] == 'estudiantes')  {
        $this->setCodEstudiante($identidadPersona['id']);
      } else {
        $this->setPadreId($identidadPersona['id']);
      }
    }
}

//instaciando a la persona por tipo

$profesora = new Persona();
$profesora->cargarDatos("Sara", "Beltrán", "1970-08-30", "sara@correo.com", ['tipo' => 'profesor', 'id' => 123]);
$estudiante = new Persona();
$estudiante->cargarDatos("Juan", "Perez", "2000-07-23", "juan@correo.com", ['tipo' => 'estudiante', 'id' => 2020203456]);
$padre = new Persona();
$padre->cargarDatos("Alberto", "Soler", "1974-07-02", "alberto@correo.com", ['tipo' => 'padre', 'id' => 234253]);
```
Según el código anterior si se requiere agregar o quitar un tipo de usuario es necsario entrar a modificar el método **cargarDatos**, a demás de agregar o quitar los atributos que requerimos.

Para realizar la implementación del principio #2 recurrimos a la **Herencia** y al **Polimorfismo** que nos permite realizar la creación de clases hijas y sobre escrbir en este caso el método **cargarDatos** según se requiera sin tener que intervernir en la clase padre **Personas**.

Aplicando el principo
```
class Persona
{
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $correo;

  //Supongamos que también están implementados los sets y gets para los atributos

    public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo, $idPersona = '')
    {
      $this->setFechaNacimiento($fechaNacimiento);
      $this->setApellido($apellido);
      $this->setNombre($nombre);
      $this->setCorreo($correo);
    }

}

class Profesor extends Persona
{
    private $profesorId;

    //Supongamos que también están implementados los sets y gets para los atributos

    /**
     * Sobre escribe el método cargarDatos de persona y agrega el atributo correpondiente al profesor
     * @param $nombre
     * @param $apellido
     * @param $fechaNacimiento
     * @param $correo
     * @param int $profesorId
     */
    public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo, $profesorId = '')
    {
      parent::cargarDatos($nombre, $apellido, $fechaNacimiento, $correo); // TODO: Change the autogenerated stub
      $this->setProfesorId($profesorId);
    }
}

class Estudiante extends Persona
{
    private $codEstudiante;

    //Supongamos que también están implementados los sets y gets para los atributos


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

class PadreFamilia extends Persona
{
  private $padreId;

    //Supongamos que también están implementados los sets y gets para los atributos

  /**
   * Sobre escribe el método cargarDatos de persona y agrega el atributo de identificación correpondiente al padre de familia
   * @param $nombre
   * @param $apellido
   * @param $fechaNacimiento
   * @param $correo
   * @param int $padreId
   */
  public function cargarDatos($nombre, $apellido, $fechaNacimiento, $correo, $padreId = 0)
  {
    parent::cargarDatos($nombre, $apellido, $fechaNacimiento, $correo); // TODO: Change the autogenerated stub
    $this->setPadreId($padreId);
  }
}

// Instaciamientos

$profesora = new Profesor();
$profesora->cargarDatos("Sara", "Beltrán", "1970-08-30", "sara@correo.com", 123);

$estudiante = new Estudiante();
$estudiante->cargarDatos("Juan", "Perez", "2000-07-23", "juan@correo.com", 2020203456);

$padre = new PadreFamilia();
$padre->cargarDatos("Alberto", "Soler", "1974-07-02", "alberto@correo.com", 234253);
```

## * Principio de sustitución de Liskov
Este principio establece que las clases hijas puede ser usada como si fuera una clase padre sin alterar su comportamiento y sin necesidad de conocer la diferencia entre ellas.

Este principio busca que las clases hijas no implementen metodos que no se usarán de la clase padre, la solución simple es sobrescribirlos y hacer que arrojen una excepción o dejarlos vacíos pero esto rompe el principio.

**Implementación:**

Para nuestro sistema educativo  tenemos la clase padre que es **Persona** que reprensenta a cualquier individuo inscrito en la plataforma, la clase **Persona** tiene los métodos **consultarDatos** y **cargarDatos** que son heredados por sus hijos **Estudiante**, **Profesor** y **PadreFamilia**. Se requiere que el estudiante entregue tareas, es posible implementar dicha acción en la clase **Persona** como método **entregarTarea**, pero esta acción también sería heredada por los profesores y padres, donde se requiería sobre escribir la función indicando con un mensaje que ese tipo de usuario no entrega tarea.

```
class Persona
{
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $correo;

  //Supongamos que también están implementados los sets y gets para los atributos

   function entregarTarea($profe) {
     return 'La persona ' .$this->getNombre().'('.$this->getCodEstudiante().') entrega tarea a la profesora '.$profe->getNombre().PHP_EOL;
   }
}

Estudiante extends Persona {
    private $codEstudiante;

    //Supongamos que también están implementados los sets y gets para los atributos

    function entregarTarea($profe) {
        return 'El estudiante ' .$this->getNombre().'('.$this->getCodEstudiante().') entrega tarea a la profesora '.$profe->getNombre().PHP_EOL;
    }
}

Profesor extends Persona
{
    private $profesorId;

    function entregarTarea($profe) {
        return 'El profesor por ahora no entrega tarea';
    }
}

PadreFamilia extends Persona
{
    private $apdreId;

    function entregarTarea($profe) {
        return 'el padre por ahora no entrega tarea';
    }
}
```



Acudimos a generar una interface **"IEntregarTarea"** para la implementación de esta acción **entregaTarea**. Abriendo la posiblidad de ser usada más adelante por los profesores o padres de familia si fuera necesario, por ejemplo si se integrara una especie de escuela de padres y/o profesores dentro de la plataforma.

Aplicando el principo
```
interface IEntregarTarea
{
  function entregarTarea($profe);
}

class Estudiante extends Persona implements IEntregarTarea
{
    private $codEstudiante;
    /**
   * @param $profe
   * @return string
   */
    function entregarTarea($profe) {
      return 'Estudiante ' .$this->getNombre().'('.$this->getCodEstudiante().') entrega tarea a la profesora '.$profe->getNombre().PHP_EOL;
    }
}
```

## Como ejecutar el programa ⚙️
Se requere acceder por consola y ubicarse en la raíz del proyecto, a continuación ejecutar el comando:

```php index.php```


## Autores ✒️

* **Edda Camila Rodrigez** - *202020*
* **Néstor Camilo Beltrán** - *20202099021*
