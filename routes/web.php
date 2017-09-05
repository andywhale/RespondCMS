<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/content', 'Admin\ContentController@index');
Route::get('/admin/content/create', 'Admin\ContentController@create');
Route::post('/admin/content', 'Admin\ContentController@store');
Route::get('/admin/content/{content}', 'Admin\ContentController@show');