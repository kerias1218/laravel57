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

Route::get('auth/register',[
    'as' => 'users.create',
    'uses' => 'UsersController@create'
]);
Route::post('auth/register',[
    'as' => 'users.store',
    'uses' => 'UsersController@store',
]);
Route::get('auth/confirm/{code}',[
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm',
]);//->where('code', '[\pL-pN]{60}');


Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create'
]);
Route::post('auth/login',[
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store'
]);
Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy'
]);


Route::get('auth/remind',[
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind'
]);
Route::post('auth/remind',[
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind'
]);

Route::get('/', 'WelcomeController@index');



Route::get('social/{provider}',[
    'as' => 'social.login',
    'uses' => 'SocialController@execute',
]);





Route::resource('articles','ArticlesController');

/*
Route::get('auth/login', function() {
    $credentials = [
        'email' => 'aa@aa.com',
        'password' => 'password'
    ];

    if(! auth()->attempt($credentials) ) {
        return 'xxxxx';
    }

    return redirect('protected');
});

Route::get('protected',['middleware'=>'auth', function() {

    return '어솝쇼 '.auth()->user()->name;
}]);

Route::get('auth/logout', function() {
    auth()->logout();

    return "또 오세요";

});

*/