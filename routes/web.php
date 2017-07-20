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


# Site Index
Route::get('/', function () {
    return view('index');
});


# Return var from url.
Route::get('/var/{var?}/', function($var = 'Cat'){
    return view('var', ['var' => $var]);
});


# Hello World route.
Route::get('/helloworld/', function() {
    return view('hello_world');
});


# Parameter testing route using id variable.
Route::get('/id/{id}/', function($id) {
    echo '<h1>ID: '.$id.'</h1>';
});


# First Middleware/Controller Test.
Route::get('/role/',[
    'middleware' => 'role:admin',
    'uses' => 'RoleController@index',
]);


# Second Middleware/Controller Test.
Route::get('/user/', [
    'middleware' => 'first',
    'uses' => 'UserController@showPath'
]);
