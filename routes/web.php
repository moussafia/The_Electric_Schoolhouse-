<?php

use App\Http\Controllers\CategoryController\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController\UserController;
use App\Http\Controllers\ViewController\ViewController;
use App\Http\Controllers\BlogsController\BlogsController;
use App\Http\Controllers\UserAuthController\UserAuthController;

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
Route::post('/logout', [UserAuthController::class,'logout'])->name('user.logout');


Route::get('/dashboard', [ViewController::class,'dashboardView'])->name('dashboardView');
Route::get('/profile', [ViewController::class,'profileView'])->name('profileView');

Route::post('/updateUser',[UserController::class,'updateProfile'])->name('user.update');
Route::post('/deleteUser',[UserController::class,'deleteProfile'])->name('user.delete');

Route::group(['middleware' => 'auth.jwt'],function(){
    Route::post('/blogStore',[BlogsController::class,'store'])->name('blog.store')->middleware('authJWT');

Route::resource('category',CategoryController::class);
// Route::post('/createCategory','CategoryController@create');

});





