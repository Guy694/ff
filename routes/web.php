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



// สร้างเพื่อส่งค่าให้เช็คดรปดาวน์ผลลัพธที่เลือกแล้ว
Route::get('page/{page}/create2', [PostController::class,'create2'])->name('page.create2');
// สำหรับสร้างรายงาน WORD
Route::get('home/generatedocx', [HomeController::class,'generatedocx'])->name('home.generatedocx');
Route::get('home/generatedocx_is', [HomeController::class,'generatedocx_is'])->name('home.generatedocx_is');

// ตัวชี้วัด
Route::get('exp/{exp}/{exp2}/show_is', [ExpController::class,'show_is'])->name('exp.show_is');
Route::post('exp/store_is', [ExpController::class,'store_is'])->name('exp.store_is');
Route::get('exp/{exp}/edit_is', [ExpController::class,'edit_is'])->name('exp.edit_is');
Route::post('exp/{exp}/update_is', [ExpController::class,'update_is'])->name('exp.update_is');
Route::delete('exp/{exp}/destroy', [ExpController::class,'destroy_is'])->name('exp.destroy_is');


// ex_side_list ย่อยของตัวชี้วัด คณะ
Route::get('exp/{exp}/show_exside', [ExpController::class,'show_exside'])->name('exp.show_exside');
Route::post('exp/store_exside', [ExpController::class,'store_exside'])->name('exp.store_exside');
Route::get('exp/{exp}/edit_exside', [ExpController::class,'edit_exside'])->name('exp.edit_exside');
Route::post('exp/{exp}/update_exside', [ExpController::class,'update_exside'])->name('exp.update_exside');
Route::delete('exp/{exp}/destroy_exside', [ExpController::class,'destroy_exside'])->name('exp.destroy_exside');


// ex_side_list ย่อยของตัวชี้วัด หน่วยอื่นๆ
Route::get('exp/{exp}/show_side', [ExpController::class,'show_side'])->name('exp.show_side');
Route::post('exp/store_side', [ExpController::class,'store_side'])->name('exp.store_side');
Route::get('exp/{exp}/edit_side', [ExpController::class,'edit_side'])->name('exp.edit_side');
Route::post('exp/{exp}/update_side', [ExpController::class,'update_side'])->name('exp.update_side');
Route::delete('exp/{exp}/destroy_side', [ExpController::class,'destroy_side'])->name('exp.destroy_side');












Route::resource('page',PostController::class);
Route::resource('exp',ExpController::class);

// เก็บไว้เผื่อเพิ่มเติม  เช็คก่อน php artisan route:list
//  Route::get('exp/{exp}', [ExpController::class,'ชื่อฟังชั่น'])->name('ชื่อเวลาเรียกใช้เช่น exp.gg');.
// เก็บไว้เผื่อเพิ่มเติม
