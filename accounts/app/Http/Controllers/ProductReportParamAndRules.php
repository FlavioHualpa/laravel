<?php

   use Illuminate\Http\Request;

   $this->parameters = [
      0 => [
         'title' => 'Estadíastica de ventas',
         'route' => route('products.reports.show', 0),
         'show_to_product' => true,
         'show_from_date' => true,
         'show_to_date' => true,
         'show_function' => function (Request $request) {
            return $this->show_statistics($request);
         },
      ],

      1 => [
         'title' => 'Comprobantes por artículo',
         'route' => route('products.reports.show', 1),
         'show_to_product' => false,
         'show_from_date' => true,
         'show_to_date' => true,
         'show_function' => function (Request $request) {
            return $this->show_invoices($request);
         },
      ],

      2 => [
         'title' => 'Ficha del artículo',
         'route' => route('products.reports.show', 2),
         'show_to_product' => true,
         'show_from_date' => false,
         'show_to_date' => false,
         'show_function' => function (Request $request) {
            return $this->show_sheet($request);
         },
      ],
   ];

   $this->rules = [
      0 => [
         'from_product_id' => 'required|exists:products,id',
         'to_product_id' => 'required|exists:products,id',
         'from_date' => 'required|date',
         'to_date' => 'required|date',
      ],

      1 => [
         'from_product_id' => 'required|exists:products,id',
         'from_date' => 'required|date',
         'to_date' => 'required|date',
      ],

      2 => [
         'from_product_id' => 'required|exists:products,id',
         'to_product_id' => 'required|exists:products,id',
      ],
   ];

   $this->messages = [
      'from_product_id.required' => 'Debes seleccionar un artículo',
      'from_product_id.exists' => 'Debes seleccionar un artículo existente',
      'to_product_id.required' => 'Debes seleccionar un artículo',
      'to_product_id.exists' => 'Debes seleccionar un artículo existente',
      'from_date.required' => 'Debes seleccionar una fecha',
      'from_date.date' => 'Debes seleccionar una fecha válida',
      'to_date.required' => 'Debes seleccionar una fecha',
      'to_date.date' => 'Debes seleccionar una fecha válida',
   ];
