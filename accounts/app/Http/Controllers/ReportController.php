<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
   protected $parameters;
   protected $rules;
   protected $messages;
   protected $appendix;
   protected $plural_appendix;
   protected $data;

   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');

      $regex = "/[A-Z][a-z]*/";
      $class = class_basename($this);
      preg_match_all($regex, $class, $matches);
      $this->appendix = $matches[0][0];
      $this->plural_appendix = Str::lower($this->appendix);
      $this->plural_appendix = Str::plural($this->plural_appendix);

      require $this->appendix . 'ReportParamAndRules.php';
   }

   public function setParameterData($data)
   {
      $this->data = $data;
   }

   public function index()
   {
      return view('reports.' . $this->plural_appendix . '.index');
   }

   public function parameters($report_id)
   {
      if ($report_id < 0 || $report_id >= count($this->parameters))
         return view('reports.notfound');
      
      $products = Product::orderedByCode()->get();

      return view('reports.' . $this->plural_appendix . '.parameters', [
         'parameters' => $this->parameters[$report_id],
         'data' => $this->data,
      ]);
   }

   public function show(Request $request, $report_id)
   {
      if ($report_id < 0 || $report_id >= count($this->parameters))
         return view('reports.notfound');
      
      $validator = Validator::make(
         $request->all(),
         $this->rules[$report_id],
         $this->messages
      );

      $validated = $validator->validate();
      $view = $this->parameters[$report_id]['show_function']($request);

      $this->setCookies($validated);
      
      return $view;
   }

   private function setCookies($validated)
   {
      $user_id = auth()->user()->id;

      foreach ($validated as $key => $value)
      {
         Cookie::queue(
            'user_' . $user_id . '_' . $key,
            $value,
            60*24*7
         );
      }
   }
}
