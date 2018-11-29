<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'test_articles';
    protected $fillable = ['title','content'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');   // 이것은(Article) user 소속 입니다.
    }
    public function tags() {
        return $this->belongsToMany(Tag::class, 'test_article_tag');
    }
}
