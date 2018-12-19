<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'header';

    protected $fillable = ['h1', 'sub', 'img'];
}
