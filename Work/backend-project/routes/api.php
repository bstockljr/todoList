<?php


//fetch all stuff from DB
Route::get('/todos', '\App\Http\Controllers\TodosController@index');

//create a todo item
Route::post('/todos', '\App\Http\Controllers\TodosController@create');

//destroy stuff
Route::delete('/todos/{id}', '\App\Http\Controllers\TodosController@destroy');

//update
Route::put('/todos', '\App\Http\Controllers\TodosController@update');

//------------------------------------------------------------------------------------

//admin fetch
Route::get('/admins', '\App\Http\Controllers\AdminController@index');
//create admin
Route::post('/createAdmin', '\App\Http\Controllers\AdminController@create');


//logIn
Route::post('/login', '\App\Http\Controllers\AdminController@login');


//------------------------------------------------------------------------------------

//User fetch
Route::get('/users', '\App\Http\Controllers\UserController@index');



//auth
Route::middleware('auth:api')->get('/auth', function(Request $request) {
    return $request->admin();});



// dd('test');  
