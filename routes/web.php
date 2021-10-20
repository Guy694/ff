<?php

use App\Http\Controllers\ExpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('home/userlist', [HomeController::class,'userlist'])->name('home.userlist');
Route::get('home/register', [HomeController::class,'register'])->name('home.register');
Route::get('home/{home}/edit', [HomeController::class,'edit'])->name('home.edit');
Route::post('home/{home}/update', [HomeController::class,'update'])->name('home.update');
Route::delete('home/{home}/destroy', [HomeController::class,'destroy'])->name('home.destroy');
Route::post('home/store', [HomeController::class,'store'])->name('home.store');





Route::get('home/managedata', [HomeController::class,'managedata'])->name('home.managedata');
// Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');
Route::resource('page',PostController::class);
Route::resource('exp',ExpController::class);

// เก็บไว้เผื่อเพิ่มเติม  เช็คก่อน php artisan route:list
//  Route::get('exp/{exp}', [ExpController::class,'ชื่อฟังชั่น'])->name('ชื่อเวลาเรียกใช้เช่น exp.gg');.
// เก็บไว้เผื่อเพิ่มเติม