<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detention extends Model
{
    //
    public $fillable = [
        'subject',
        'description'
    ];
}
