<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'users';
    protected $dates = ['last_login'];

    protected $fillable = [
        'name', 'email', 'password','confirm_code','activated',
    ];

    protected $hidden = [
        'password', 'remember_token','confirm_code',
    ];

    protected $casts = ['activated'=>'boolean',];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function scopeSocialUser($query, $email) {
        return $query->whereEmail($email)->whereNull('password');
    }

}
