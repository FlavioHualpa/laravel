<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkFooter extends Model
{
    protected $table = "links_footer";

    protected $fillable = [
        'titulo', 'url',
        'contenido', 'orden'
    ];
}
