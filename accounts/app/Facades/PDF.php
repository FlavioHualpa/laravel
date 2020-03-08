<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PDF extends Facade
{
    public static function getFacadeAccessor()
    {
        return \App\Services\PDFMaker::class;
    }
}
