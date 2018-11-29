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

