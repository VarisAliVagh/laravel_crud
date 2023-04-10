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
Route::get('/trash-data',[RegisterController::class,'trash']);
Route::get('/data-restore/{id}',[RegisterController::class,'restore'])->name('data-restore');
Route::get('/force_delete/{id}',[RegisterController::class,'force_delete'])->name('force_delete');



Route::get('get-all-session',function(){
    $session = session()->all();
    pre($session);
});

Route::get('set-all-session',function(){
    $session = session()->put('name','varisali');
    $session = session()->put('id','123');
    session()->flash('status','success');
    return redirect('get-all-session');
});

Route::get('destroy-all-session',function(){
    $session = session()->forget('name','varisali');
    $session = session()->forget('id','123');
    return redirect('get-all-session');
});

Route::get('/upload',function(){
    return view('upload');
});

Route::post('/upload/save',[RegisterController::class,'upload_file']);
