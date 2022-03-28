<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowControllers;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addProduct',['as'=>'_addProduct','uses'=>'HomeController@addProducts']);

Route::post('/addProduct',['as'=>'add.product','uses'=>'HomeController@createProduct']);

Route::get('/profile/{id}',['as'=>'profile','uses'=>'HomeController@userProfile']);

Route::post('/updateing_profile',['as'=>'update.profile','uses'=>'HomeController@updateProfile']);

Route::get('/list_of_products',[ 'as'=>'show.medicine', 'uses'=>'ShowController@showMedicine']);

Route::get('/edit_medicine_info/{id}',['as'=>'edit.medicine', 'uses'=>'ShowController@editMedicine']);

Route::post('/update_medicine_info',['as'=>'update', 'uses'=>'ShowController@updateMedicine']);

Route::post('/delete_medicine_info',[ 'as'=>'delete.medicine', 'uses'=>'ShowController@deleteMedicine']);

Route::get('/list_of_products',[ 'as'=>'show.medicine', 'uses'=>'ShowController@showMedicine']);

