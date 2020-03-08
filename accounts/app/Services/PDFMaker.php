<?php

namespace App\Services;

use Dompdf\Dompdf;
use App\Invoice;

class PDFMaker
{
   public function makeInvoicePDF(Invoice $invoice)
   {
      $view = view('invoices.show')->with('invoice', $invoice);
      // return $view;

      $pdf = new Dompdf;
      $pdf->setPaper('A4');
      $pdf->loadHtml($view->render());
      $pdf->render();

      return $pdf;
   }
}
