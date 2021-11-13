<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    $data["user"]="testing";
    $data["title"]="Home";
    return view('home',$data);
});

Route::resource('user', UserController::class);
Route::get('user', [UserController::class,'index']);
Route::post('user/store', [UserController::class,'store'])->name('user.store');
Route::post('user/postal', [UserController::class,'postal'])->name('user.postal');
//Route::post('user', [UserController::class,'subdistrict'])->name('user.subdistrict');
//Route::get('ajaxRequest', [AjaxController::class, 'ajaxRequest']);
//Route::post('ajaxRequest', [AjaxController::class, 'ajaxRequestPost'])->name('ajaxRequest.post')



