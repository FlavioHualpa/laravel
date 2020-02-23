<?php

namespace App\Http\Controllers;

use App\Company;
use App\Condition;
use App\OrderQuery;
use App\State;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:admin');
   }
   
   public function index()
   {
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'street', 'fiscal_id', 'created_at'
      ]);

      $account_id = auth('admin')->id();
      $companies = Company::orderBy($order, $dir)
                           ->where('account_id', $account_id)
                           ->get();

      return view('admin.companies.search')
               ->with([
                  'companies' => $companies
               ]);
   }

   public function create()
   {
      $states = State::orderBy('name')->get();
      $conditions = Condition::orderBy('name')->get();

      return view('admin.companies.create')
            ->with([
               'states' => $states,
               'conditions' => $conditions
            ]);
   }

   public function store(StoreCompanyRequest $request)
   {
      Company::create($request->all());

      return redirect()->route('admin.companies.search');
   }

   public function edit(Company $company)
   {
      $states = State::orderBy('name')->get();
      $conditions = Condition::orderBy('name')->get();

      return view('admin.companies.edit')
            ->with([
               'company' => $company,
               'states' => $states,
               'conditions' => $conditions
            ]);
   }

   public function update(UpdateCompanyRequest $request, Company $company)
   {
      $company->code = $request->code;
      $company->name = $request->name;
      $company->address = $request->address;
      $company->phone = $request->phone;
      $company->email = $request->email;
      $company->fiscal_id = $request->fiscal_id;
      $company->condition_id = $request->condition_id;
      $company->save();

      return redirect()->route('admin.companies.search');
   }
}
