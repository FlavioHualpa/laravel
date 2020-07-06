<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoPedidoEnviado extends Mailable
{
   use Queueable, SerializesModels;

   public $pedido;
   public $encabezados;
   
   /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct($pedido, $encabezados)
   {
      $this->pedido = $pedido;
      $this->encabezados = $encabezados;
   }
   
   /**
   * Build the message.
   *
   * @return $this
   */
   public function build()
   {
      return $this->view('emails.nuevo-pedido');
   }
}
