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

Route::get('/', ['uses' => 'Controller@homepage']);

Route::get('/signup', ['uses' => 'Controller@signup']);

// Routes to user auth
Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'users.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'users.dashboard', 'uses' => 'DashboardController@index']);

// Route::get('user', ['as' => 'user.index', 'uses' => 'UsersController@index']);

Route::resource('user', 'UsersController');

//Routes to Instituition
Route::resource('instituition', 'InstituitionsController');

//Routes to Group
Route::resource('group', 'GroupsController');
Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);

//Routes to Product
Route::resource('instituition.product', 'ProductsController');

//Routes to Movement
Route::get('movement', ['as' => 'movement.application', 'uses' => 'MovementsController@application']);
Route::post('movement', ['as' => 'movement.application.store', 'uses' => 'MovementsController@storeApplication']);