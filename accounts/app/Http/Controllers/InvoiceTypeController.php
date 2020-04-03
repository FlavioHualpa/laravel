<?php

namespace App\Http\Controllers;

use App\Customer;
use App\InvoiceType;
use Illuminate\Http\Request;

class InvoiceTypeController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');
   }
   
   public function getList(Customer $customer)
   {
      $condition_id = $customer->condition_id;
      $invoice_types = InvoiceType::where('condition_id', $condition_id)
                                 ->orderBy('name')
                                 ->get();
      
      return $invoice_types;
   }
}
