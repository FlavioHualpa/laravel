<?php

namespace App\Http\Controllers;

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
        // $this->middleware('auth')->except( ['index'] );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $roomTypes = \App\RoomType::all();
        $testimonies = \App\Testimony::latest()->take(4)->get();
        $menus = \App\Menu::take(6)->get();

        return view('index')->with([
            // 'roomTypes' => $roomTypes,
            'testimonies' => $testimonies,
            'menus' => $menus
        ]);
    }

    public function getArray()
    {
        return view('array');
    }

    public function showArray()
    {
        // dd(request('direccion.calle'));
        dd(request()->all());
    }
}
