<?php

use App\Http\Controllers\CategoryController\CategoryController;
use App\Http\Controllers\CommantaireController;
use App\Http\Controllers\RepondreController;
use App\Http\Controllers\TagsController\TagsController;
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
Route::get('/articles', [ViewController::class,'ArticlesView'])->name('ArticlesView');
Route::get('/readArticle/{id}', [ViewController::class,'readArticle'])->name('readArticle');
Route::get('/users', [ViewController::class,'usersView'])->name('users.view');
Route::get('/help', [ViewController::class,'helpView'])->name('helpView');

Route::post('/updateUser',[UserController::class,'updateProfile'])->name('user.update');
Route::post('/deleteUser',[UserController::class,'deleteProfile'])->name('user.delete');

Route::group(['middleware' => 'authJWT'],function(){
Route::post('/blogStore',[BlogsController::class,'store'])->name('blog.store');
Route::post('/blogupdate/{id}',[BlogsController::class,'updateBlog'])->name('blog.update');
Route::post('/blogDelete/{id}',[BlogsController::class,'deleteBlog'])->name('blog.delete');
Route::get('/showBlogs',[BlogsController::class,'showMyBlogs'])->name('showBlogs');
Route::get('/indexBlog',[BlogsController::class,'index'])->name('indexBlog');
Route::get('/searchBlogs',[BlogsController::class,'searchBlogs'])->name('searchBlogs');
Route::get('/barSearchBlogs',[BlogsController::class,'searchBlogs'])->name('barSearchBlogs');
Route::get('/filterBlog',[BlogsController::class,'filterBlog'])->name('filterBlog');

Route::get('/getAllCategory',[CategoryController::class,'getAllCategory'])->name('getAllCategory');
Route::get('/getAllTags',[TagsController::class,'getAllTags'])->name('getAllTags');

Route::post('/commantaireStore',[CommantaireController::class,'store'])->name('commantaire.store');
Route::get('/getAllCommantaires/{id}',[CommantaireController::class,'show'])->name('commantaire.show');
Route::post('/deleteComment/{id}',[CommantaireController::class,'delete'])->name('repondre.delete');

Route::post('/createRepondre',[RepondreController::class,'store'])->name('repondre.store');





});





