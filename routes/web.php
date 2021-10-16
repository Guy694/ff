<?php

use App\Http\Controllers\add_ind;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');



Route::get('/add_ind', [add_ind::class, 'add_ind_page'])->name('home.add_ind');
Route::get('/add_exp_ind', [add_ind::class, 'add_exp_ind_page'])->name('home.add_exp_ind');
