<?php

Route::get('/json', 'ContentController@index');
Route::get('/json/{content}', 'ContentController@index');
Route::get('/tagged/{tag}', 'TagController@index');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/admin', 'Admin\DashboardController@index');

Route::get('/admin/content', 'Admin\ContentController@index');
Route::get('/admin/content/create', 'Admin\ContentController@create');
Route::post('/admin/content', 'Admin\ContentController@store');
Route::get('/admin/content/{content}/edit', 'Admin\ContentController@edit');
Route::post('/admin/content/{content}', 'Admin\ContentController@update');
Route::get('/admin/content/{content}/delete', 'Admin\ContentController@destroy');

Route::get('/admin/tags', 'Admin\TagController@index');
Route::get('/admin/tags/create', 'Admin\TagController@create');
Route::post('/admin/tags', 'Admin\TagController@store');
Route::get('/admin/tags/{tag}', 'Admin\TagController@show');
Route::get('/admin/tags/{tag}/delete', 'Admin\TagController@destroy');