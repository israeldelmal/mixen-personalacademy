<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relaciones
    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }

    public function services() {
        return $this->hasMany('App\Service');
    }

    public function testimonies() {
        return $this->hasMany('App\Testimonie');
    }
}
