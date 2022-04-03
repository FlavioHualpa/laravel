<?php

namespace App\Http\Controllers;

use App\Models\MedicalCenter;
use App\Models\Professional;
use App\Models\Specialization;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        $anyCenter = new MedicalCenter;
        $anyCenter->id = 0;
        $anyCenter->name = '(cualquier centro médico)';

        return view('appointment.create', [

            'medicalCenters' => MedicalCenter::orderBy('name')
                                    ->get()
                                    ->prepend($anyCenter),

            'professionals' => Professional::orderBy('last_names')->get(),

            'specializations' => Specialization::orderBy('name')->get()
        
        ]);
    }
}
