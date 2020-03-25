<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Invoice;

class InvoiceNotification extends Notification
{
   use Queueable;
   
   private $invoice;

   /**
   * Create a new notification instance.
   *
   * @return void
   */
   public function __construct(Invoice $invoice)
   {
      $this->invoice = $invoice;
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
      $pdf = \PDF::makeInvoicePDF($this->invoice);

      $pdfName = $this->invoice->company->name . ' - ' .
         $this->invoice->invoice_type->name . ' Nro ' .
         $this->invoice->number . '.pdf';

      $company_id = $this->invoice->company->id;

      \Storage::put(
         "public\\invoices-company-id-$company_id\\$pdfName",
         $pdf->output()
      );

      return (new MailMessage)
         ->subject('Comprobante digital de ' . $this->invoice->company->name)
         ->greeting('Estimado cliente')
         ->line('Adjuntamos ' . $this->invoice->invoice_type->name . ' Nro ' . $this->invoice->number . ' en formato digital.')
         ->salutation('Le enviamos nuestros cordiales saludos.')
         ->attach(public_path(
            "storage\\invoices-company-id-$company_id\\$pdfName"
         ));
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
