<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test_author extends Model
{
    protected $table = 'test_authors';
    public $timestamps = false;
    protected $fillable = ['email','password'];
    //
}
