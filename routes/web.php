<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[AboutController::class,'index']);


Route::get('/register',[RegisterController::class,'index']);
Route::get('/delete/{id}',[RegisterController::class,'delete'])->name('customer_delete');
Route::post('/register',[RegisterController::class,'insert'])->name('customer_insert');
Route::get('/edit/{id}',[RegisterController::class,'edit'])->name('customer_edit');

Route::post('/update/{id}',[RegisterController::class,'update'])->name('customer_update');

