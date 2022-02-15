<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhyAuthController;
use App\Http\Controllers\AdminController;
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
    return view('layouts/home');
});
Route::get('/login',[PhyAuthController::class,'login'])->name('login.index');
Route::get('/register',[PhyAuthController::class,'registration'])->name('register.index');

Route::post('/login_action',[PhyAuthController::class,'onSuccess'])->name('login.action');
Route::post('/register_action',[PhyAuthController::class,'onSuccess'])->name('register.action');

//admin login..
Route::post('/admin_login', [AdminController::class, 'login_dashboard'])->name('login.admin');
Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard'])->name('dashboard.admin');

//admin logout..
Route::get('logout', [AdminController::class, 'flush']);

Route::get('/cashier', function () {
    return view('cashier.dashboard');
});
Route::get('/manager', function () {
    return view('manager.dashboard');
});
Route::get('/pharmacist', function () {
    return view('pharmacist.dashboard');
});


