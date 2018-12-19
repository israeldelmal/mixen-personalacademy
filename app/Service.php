<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['h1', 'content', 'img', 'user_id', 'status'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
