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

Route::resource('user', 'UserController');
Route::resource('event', 'EventController');
Route::resource('individual', 'IndividualController');
Route::resource('media', 'MediaController');
Route::resource('species', 'SpeciesController');
Route::resource('spot', 'SpotController');
Route::resource('circuit', 'CircuitController');
Route::get('event/get_by_proposer_id/{id}', 'EventController@get_by_proposer');
Route::get('m/u', 'EventController@unallocated');
Route::get('/user/login/{email}/{password}', 'UserController@login');
Route::get('/user/activate_account/{id}/{activation_code}', 'UserController@activate_account');
Route::get('/user/resend_activation/{id}', 'UserController@resend_activation_code');
Route::post('/m/eve', 'MediaController@event_store');
Route::post('/user/admins', 'UserController@admins');
Route::post('/user/simple', 'UserController@simple_users');
Route::post('/user/super', 'UserController@super_admin');
Route::get('user/ban_account/{id}', 'UserController@desactivate_accoutn');
Route::get('user/activate/{id}', 'UserController@retablir_account');
Route::get('user/get_by/{id}', 'UserController@get_by_id');
Route::get('user/{id}/{role}', 'UserController@update_role');
Route::get('event/allow/{id}','EventController@allow_event');
Route::get('event/subscribe/{user_id}/{event_id}', 'EventController@subscribe');
