<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdata extends Model
{
    protected $fillable = [
        'name', 'image',
    ];
}
