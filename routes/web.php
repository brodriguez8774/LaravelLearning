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


# Hello World route.
Route::get('/helloworld/', function() {
    return view('hello_world');
});


# Parameter testing route using id variable.
Route::get('/id/{id}/', function($id) {
    echo '<h1>ID: '.$id.'</h1>';
});


Route::get('/role/',[
    'middleware' => 'role:admin',
    'uses' => 'RoleController@index',
]);
