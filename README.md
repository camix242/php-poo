# Principios Programación Orientada a Objeto

_A través de un proyecto sencillo en PHP pretendemos representar algunos principios de la  programción oritentada a objetos_

### Pre-requisitos 📋

_Para poder realizar la ejecución por consola de los ejemplo es necesario tener una versión de PHP mayor a 7.0._

## Contexto del ejerccio ✒️

Se realiza el desarrollo de una paltaforma educativa donde los distintos actores (Estudiantes, profesores y padres), intervienen con sus respectivas acciones en la dinámica de asignación, entrega y validación de tareas.


## Principios que se aplicaron 🚀

_Se parte de los principios SOLID de los cuales escogimos los siguientes 3:_
* SOLID #3: Principio de sustitución de Liskov  (Liskov substitution Principle).
* Principio 2
* Principio 3

## Ejemplo Principio de sustitución de Liskov

Este principio establece que las clases hijas puede ser usada como si fuera una clase padre sin alterar su comportamiento y sin necesidad de conocer la diferencia entre ellas.

A nuestro entendimiento este principio busca que las clases hijas no implementen metodos que no se usarán de la clase padre, para solucionar lo anterior se propone el uso de **interfaces**.

**Ejemplo:**

Para un sistema de registro de notas de universidad tenemos la clase padre que es **Persona** que reprensenta a cualquier individuo inscrito en la plataforma, la clase **Persona** tiene los métodos **consultarDatos** y **modificarDatos** que son heredados por sus hijos **Estudiante** y **Profesor**. Se requiere que el estudiante entregue tareas, es posible implementar dicha acción en la clase **Persona**, pero esta acción también sería heredada por los profesores, por lo tanto generamos una interface **"IEntregarTarea"** para la implementación de esta acción. Abriendo la posiblidad de ser usada más adelante por los profesores si fuera necesario.

```php ejemplo_1.php```


## Autores ✒️

* **Fulanito 1** - *Trabajo Inicial*
* **Fulanito Detal** - *Documentación*
