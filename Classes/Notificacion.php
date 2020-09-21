<?php


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
