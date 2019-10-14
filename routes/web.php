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
Route::get('/login', ['as' => 'login', 'uses' => 'Controller@login']);
Route::post('/login', ['as' => 'users.login', 'uses' => 'DashboardController@auth']);

Route::get('/signup', ['uses' => 'Controller@signup']);

Route::group( ['middleware' => 'auth' ], function()
{
//Routes to Movement
Route::get('movement', ['as' => 'movement.application', 'uses' => 'MovementsController@application']);
Route::post('movement', ['as' => 'movement.application.store', 'uses' => 'MovementsController@storeApplication']);
Route::get('user/movement', ['as' => 'movement.index', 'uses' => 'MovementsController@index']); // ambiguidade nesta rota por isso movi pra cima
Route::get('movement/all', ['as' => 'movement.all', 'uses' => 'MovementsController@all']);
Route::get('withdraw', ['as' => 'movement.withdraw', 'uses' => 'MovementsController@withdraw']);
Route::post('withdraw', ['as' => 'movement.withdraw.store', 'uses' => 'MovementsController@storeWithdraw']);


Route::get('/', ['uses' => 'Controller@homepage']);


// Routes to user auth

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

Route::get('/logout', ['as' => 'user.logout', 'uses' => 'DashboardController@logout']);
});
