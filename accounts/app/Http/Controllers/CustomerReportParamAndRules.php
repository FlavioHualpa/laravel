<?php

   use Illuminate\Http\Request;

   $this->parameters = [
      0 => [
         'title' => 'Listado de operaciones',
         'route' => route('customers.reports.show', 0),
         'show_to_customer' => false,
         'show_from_date' => true,
         'show_to_date' => true,
         'show_function' => function (Request $request) {
            return $this->show_operations($request);
         },
      ],

      1 => [
         'title' => 'Listado de cuenta corriente',
         'route' => route('customers.reports.show', 1),
         'show_to_customer' => false,
         'show_from_date' => false,
         'show_to_date' => false,
         'show_function' => function (Request $request) {
            return $this->show_balance($request);
         },
      ],

      2 => [
         'title' => 'Listado de saldos',
         'route' => route('customers.reports.show', 2),
         'show_to_customer' => true,
         'show_from_date' => false,
         'show_to_date' => false,
         'show_function' => function (Request $request) {
            return $this->show_totals($request);
         },
      ],

      3 => [
         'title' => 'Ficha del cliente',
         'route' => route('customers.reports.show', 3),
         'show_to_customer' => true,
         'show_from_date' => false,
         'show_to_date' => false,
         'show_function' => function (Request $request) {
            return $this->show_profiles($request);
         },
      ],
   ];

   $this->rules = [
      0 => [
         'from_customer_id' => 'required|exists:customers,id',
         'from_date' => 'required|date',
         'to_date' => 'required|date',
      ],

      1 => [
         'from_customer_id' => 'required|exists:customers,id',
      ],

      2 => [
         'from_customer_id' => 'required|exists:customers,id',
         'to_customer_id' => 'required|exists:customers,id',
      ],

      3 => [
         'from_customer_id' => 'required|exists:customers,id',
         'to_customer_id' => 'required|exists:customers,id',
      ],
   ];

   $this->messages = [
      'from_customer_id.required' => 'Debes seleccionar un cliente',
      'from_customer_id.exists' => 'Debes seleccionar un cliente existente',
      'to_customer_id.required' => 'Debes seleccionar un cliente',
      'to_customer_id.exists' => 'Debes seleccionar un cliente existente',
      'from_date.required' => 'Debes seleccionar una fecha',
      'from_date.date' => 'Debes seleccionar una fecha válida',
      'to_date.required' => 'Debes seleccionar una fecha',
      'to_date.date' => 'Debes seleccionar una fecha válida',
   ];
