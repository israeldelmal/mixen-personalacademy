<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['h1', 'slug', 'sub', 'content', 'list', 'img', 'user_id', 'status'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
