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

// Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');

Route::resource('page',PostController::class);
// Route::post('exp', [ExpController::class,'store']);
// Route::get('exp', [ExpController::class,'index']);
// Route::get('exp/{exp}', [ExpController::class,'create']);
// Route::delete('exp/{exp}', [ExpController::class,'destroy']);
// Route::put('exp/{exp}', [ExpController::class,'update']);
// Route::get('exp/{exp}', [ExpController::class,'show']);
// Route::get('exp/{exp}', [ExpController::class,'edit']);
 Route::resource('exp',ExpController::class);