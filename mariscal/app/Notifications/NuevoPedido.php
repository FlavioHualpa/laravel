<?php

namespace App\Notifications;

use App\Mail\NuevoPedidoEnviado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoPedido extends Notification
{
   use Queueable;
   
   protected $pedido;
   protected $encabezados;

   /**
   * Create a new notification instance.
   *
   * @return void
   */
   public function __construct($pedido, $encabezados)
   {
      $this->pedido = $pedido;
      $this->encabezados = $encabezados;
   }
   
   /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
   public function via($notifiable)
   {
      return ['mail'];
   }
   
   /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
   public function toMail($notifiable)
   {
      $mail = new NuevoPedidoEnviado($this->pedido, $this->encabezados);
      $mail->subject('Nuevo Pedido #' . $this->pedido->numero);

      return $mail;
   }
   
   /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
   public function toArray($notifiable)
   {
      return [
         //
      ];
   }
}
