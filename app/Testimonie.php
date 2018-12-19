<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonie extends Model
{
    protected $table = 'testimonies';

    protected $fillable = ['name', 'content', 'img', 'user_id', 'status'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
