<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descanso extends Model
{
    protected $table = 'break';

    protected $fillable = ['h1', 'img'];
}
