<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['title', 'slug', 'content', 'img', 'description', 'keywords', 'user_id', 'status'];

    // Relaciones
    public function user() {
        return $this->belongsTo('App\User');
    }
}
