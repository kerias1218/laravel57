<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceUser extends Model
{

    public $table = 'price_user';
    //protected $primaryKey = 'pu_idx';

    protected $fillable = [
        'pu_email', 'pu_keyword', 'pu_price'
    ];

    /*
    protected $hidden = [
        'password', 'remember_token',
    ];
    */

}
