<?php

use App\Http\Controllers\UserAuthController\UserAuthController;
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
    return view('welcome');
})->name('welcome');

Route::get('/signUP',function(){
return view('authPages.signUP');
})->name('authPages.signUP');

Route::get('/logIN',function(){
return view('authPages.logIn');
})->name('authPages.logIN');
Route::get('/forgetPassword',function(){
    return view('authPages.forgetPassword');
})->name('authPages.forgetPassword');
Route::post('/signup',[UserAuthController::class,'registrer'])->name('signUP');
Route::post('/logIN',[UserAuthController::class,'logIn'])->name('logIn');
Route::post('/forgetpassword',[UserAuthController::class,'ForgetPassword'])->name('forgetpassword');
Route::get('/password/reset/{token}', [UserAuthController::class,'showResetForm'])->name('password.reset');
Route::post('/password/reset', [UserAuthController::class,'reset'])->name('password.update');

