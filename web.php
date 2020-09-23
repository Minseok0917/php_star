<?php

use Core\Core\Route;
// use Core\Route;  

// use dirname(Core>Route.php);

Route::post('/User/register', 'UserController@registerProcess');
Route::post('/User/login', 'UserController@loginprocess');

Route::get('/', 'MainController@index');
Route::get('/User/join', 'UserController@register');
Route::get('/User/login', 'UserController@login');

Core\Core\Route::init();