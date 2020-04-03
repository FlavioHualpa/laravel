<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Balance extends Facade
{
    public static function getFacadeAccessor()
    {
        return \App\Services\BalanceList::class;
    }
}
