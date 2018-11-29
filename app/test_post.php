<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test_post extends Model
{
    protected $table = 'test_posts';
    public $timestamps = false;
    protected $fillable = ['title','body'];
    //
}
