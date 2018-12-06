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

    protected $dates = ['last_login'];
    protected $fillable = [
        'name', 'email', 'password', 'confirm_code', 'activated',
    ];

    protected $hidden = [
        'password', 'remember_token','confirm_code',
    ];

    // 모델에서 프로퍼티의 값을 조회할때 자동으로 타입변환할 목록 정의
    protected $casts = [
        'activated' => 'boolean',
    ];

    public function articles() {
        return $this->hasMany(Article::class, 'user_id');  // 이것은(User) 여러개의 article 을 가지고 있습니다.
    }
}
