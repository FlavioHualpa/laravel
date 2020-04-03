<?php

namespace App\Services;

use App\Customer;
use App\Invoice;
use App\Payment;
use App\Facades\LocalFormat;

class BalanceList
{
   public function still_to_apply_payments(Customer $customer)
   {
      $list = [];
      $payments = $customer->payments;
      $invoices = $customer->invoices_with_balance('dec');

      foreach ($payments as $payment)
      {
         $remaining = $payment->remaining_to_apply();
         if ($remaining > 0.0)
            $list[] = [
               'applicant_id' => $payment->id,
               'applicant_type' => Payment::class,
               'applicant_info' => "Recibo $payment->number  •  Restante: "
                  . LocalFormat::currency($remaining),
               'remaining' => $remaining,
            ];
      }

      foreach ($invoices as $invoice)
      {
         $remaining = $invoice->remaining_to_apply();
         if ($remaining > 0.0)
            $list[] = [
               'applicant_id' => $invoice->id,
               'applicant_type' => Invoice::class,
               'applicant_info' => $invoice->invoice_type->name .
                  " " . $invoice->number . "  •  Restante: "
                  . LocalFormat::currency($remaining),
               'remaining' => $remaining,
            ];
      }

      return $list;
   }

   public function still_to_apply_invoices(Customer $customer)
   {
      $list = [];
      $invoices = $customer->invoices_with_balance('inc');

      foreach ($invoices as $invoice)
      {
         $remaining = $invoice->remaining_not_applied();
         if ($remaining > 0.0)
            $list[] = [
               'invoice_id' => $invoice->id,
               'invoice_name' => $invoice->invoice_type->name,
               'invoice_number' => $invoice->number,
               'invoice_date' => LocalFormat::date($invoice->created_at),
               'remaining' => $remaining,
            ];
      }

      return $list;
   }
}