<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'brach',
        'number',
    ];

    public function __construct()
    {
        $this->branch = env('BRANCH_NUMBER', 92);
        $this->number = self::max('number') ?: 0;
        $this->number++;
    }

    public function getLastInsertedId()
    {
        return self::max('id');
    }
}
