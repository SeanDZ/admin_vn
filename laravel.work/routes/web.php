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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'web'], function() {
    Route::get('/post/index', 'PostController@index');
    Route::get('/post/show/{id}','PostController@show');//{post}<=>{id}模型绑定  一致
    Route::get('/post/create','PostController@create');
    Route::post('/post/store','PostController@store');
    Route::get('/post/edit/{id}','PostController@edit');
    Route::get('/post/update/{id}','PostController@update');
    Route::get('/post/delete','PostController@delete');
});

//开启session,(kernel.php),中间件web可以防止csrf攻击
Route::group(['middleware' => ['web']], function(){
    Route::any('/post/session1','StudyController@session1');
});

Route::group(['middleware' => ['web']], function(){
    Route::get('student/index','StudentController@index');
    Route::any('student/create','StudentController@create');
    Route::any('student/store','StudentController@store');

    Route::any('student/update/{id}','StudentController@update');
    Route::any('student/detail/{id}','StudentController@detail');
    Route::any('student/delete/{id}','StudentController@delete');
});
