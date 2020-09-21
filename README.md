# Principios Programación Orientada a Objeto

_A través de un proyecto sencillo en PHP pretendemos representar algunos principios de la  programción oritentada a objetos_

### Pre-requisitos 📋

_Para poder realizar la ejecución por consola de los ejemplo es necesario tener una versión de PHP mayor a 7.0._

## Contexto del ejerccio ✒️

Se realiza el desarrollo de una paltaforma educativa donde los distintos actores (Estudiantes, profesores y padres), intervienen con sus respectivas acciones en la dinámica de asignación, entrega y validación de tareas.


## Principios que se aplicaron 🚀

_Se parte de los principios SOLID de los cuales escogimos los siguientes 3:_
* SOLID #1: Principio de responsabilidad única (Single Responsibility Principle (SRP))
* SOLID #3: Principio de sustitución de Liskov  (Liskov substitution Principle).

## * Principio de responsabilidad única
Este principio establce que un módulo solo debe tener un motivo para cambiar (Una razón de cambio).
Por lo tanto una clase debería estar destinada a una única responsabilidad y no mezclar la de otros o las que no le incumben a su dominio.

**Implementación:**
tenemos las clase **Profesor** que tienen los métodos **signarTarea** y **calificarTarea**, también tenemos la clase **Estudiante** con el método **entregarTarea**, se requiere realizar una notificación via correo para avisar al profesor o al estudiante que se relaizó dicha accción según correponda.
Con el fin de respetar el pricipio SOLID #1 hemos creado una clase **Notificacion** en la cual se implementa un método **notificar** que realizar el "envío" del correo, en lugar de realizar la notificación en cada una de las clases que requieren notificar.

## * Principio de sustitución de Liskov
Este principio establece que las clases hijas puede ser usada como si fuera una clase padre sin alterar su comportamiento y sin necesidad de conocer la diferencia entre ellas.

A nuestro entendimiento este principio busca que las clases hijas no implementen metodos que no se usarán de la clase padre, para solucionar lo anterior se propone el uso de **interfaces**.

**Implementación:**

Para un sistema de registro de notas de universidad tenemos la clase padre que es **Persona** que reprensenta a cualquier individuo inscrito en la plataforma, la clase **Persona** tiene los métodos **consultarDatos** y **modificarDatos** que son heredados por sus hijos **Estudiante** y **Profesor**. Se requiere que el estudiante entregue tareas, es posible implementar dicha acción en la clase **Persona**, pero esta acción también sería heredada por los profesores, por lo tanto generamos una interface **"IEntregarTarea"** para la implementación de esta acción. Abriendo la posiblidad de ser usada más adelante por los profesores si fuera necesario.

```php ejemplo_1.php```


## Autores ✒️

* **Edda Camila Rodrigez** - *202020*
* **Néstor Camilo Beltrán** - *20202099021*
