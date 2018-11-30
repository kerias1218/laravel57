<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function queryShow() {
    DB::listen(function($query){
        dump($query->sql);
    });

}


Route::get('/', 'WelcomeController@index');
Route::resource('/articles', 'ArticlesController');

//queryShow();

Route::get('mail', function() {
    $article = \App\Article::with('user')->find(1);

    return Mail::send(
        'emails.articles.created',
        compact('article'),
        function($message) use ($article) {
            $message->to('kerias@naver.com');
            $message->subject('새글이 등록되었습니다.'.$article->title);
        }
    );
});

Route::get('markdown', function(){
    $text = <<<Eot

    Welcome to the demo of Parsedown Extra [^1]:

1. Write Markdown text on the left
2. Hit the __Parse__ button or `⌘ + Enter`
3. See the result to on the right

This is an interactive demo of

[^1]: [Parsedown Extra](https://github.com/erusev/parsedown-extra) is an extension of [Parsedown](/) that adds support for [Markdown Extra](https://michelf.ca/projects/php-markdown/extra/).
Eot;

    return app(ParsedownExtra::class)->text($text);

});


Route::get('docs/{file?}', function($file=null){
    $text = (new App\Documentation)->get($file);
    return app(ParsedownExtra::class)->text($text);
});





Route::get('auth/login', function(){
    $credentials = [
        'email'=>'aa@aa.com',
        'password'=>'password'
    ];

    if( ! auth()->attempt($credentials) ) {
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});


Route::get('protected', ['middleware'=>'auth',function() {
    
}]);


Route::get('auth/logout', function() {
    auth()->logout();

    return '또뵈요';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
