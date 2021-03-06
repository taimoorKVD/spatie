<?php

use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::get('permissions','RoleController@permissions');
    Route::get('create-permission','RoleController@create_permission');
    Route::post('store-permission','RoleController@store_permission');
    Route::get('show-permission/{id}','RoleController@show_permission');
    Route::get('edit-permission/{id}','RoleController@edit_permission');
    Route::post('update-permission/{id}','RoleController@update_permission');
    Route::post('delete-permission/{id}','RoleController@delete_permission');
});