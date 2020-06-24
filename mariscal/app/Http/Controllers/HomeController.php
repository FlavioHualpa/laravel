<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $homeSections = Home::with('secciones')->get();

        $homeSectionsIncludes = [
            'layouts.partials.home-banner',
            'layouts.partials.home-products',
            'layouts.partials.home-new',
        ];

        return view('home')->
            with([
                'homeSections' => $homeSections,
                'homeSectionsIncludes' => $homeSectionsIncludes,
            ]);
    }
}
