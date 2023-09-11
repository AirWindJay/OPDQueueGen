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

Route::get('/', 'HomeController@queuepage');

Route::get('/newpatientadd', 'HomeController@newpatientadd');
Route::get('/oldpatientadd', 'HomeController@oldpatientadd');



Route::get('/newpatientprioadd', 'HomeController@newpatientprioadd');
Route::get('/oldpatientprioadd', 'HomeController@oldpatientprioadd');



Route::get('/report', 'HomeController@report');

Route::get('/onload', 'HomeController@onload');