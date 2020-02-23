<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = \App\RoomType::all();

        return view('hotel.rooms')->with([
            'roomTypes' => $roomTypes
        ]);
    }

    public function show($id)
    {
        $roomType = \App\RoomType::find($id);

        return view('hotel.room-detail')->with([
            'roomType' => $roomType
        ]);
    }
}
