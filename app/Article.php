<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';
    protected $fillable = ['title','content'];
    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }


    /*
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    */
}


