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


/*
Route::get('/', function () {
    $items = ['aa','bb','cc'];
    return view('welcome',['items'=>$items]);
});
*/

Route::get('/', 'WelcomeController@index');
Route::resource('/articles', 'ArticlesController');

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
