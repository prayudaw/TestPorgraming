<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'logo',
        'website'
    ];
    
}
