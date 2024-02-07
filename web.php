<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as FrontHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController;
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
Route::group(['prefix' => 'admin'],function (){
    Route::get('/',[AdminHomeController::class,'index'])->name('admin-index');

    Route::get('/posts',[AdminPostController::class,'index'])->name('admin-posts');
    Route::get('/post/add',[AdminPostController::class,'addShow'])->name('admin-post-add');
    Route::post('/post/add',[AdminPostController::class,'add'])->name('admin-post-add-post');

//    Route::resource('posts',AdminPostHomeController::class);
//    Route::resource('post',AdminPostHomeController::class)->only(['destroy']);
});


Route::get("/",[FrontHomeController::class,'index'])->name('index');

Route::get("/posts",[PostController::class,'index'])->name('post');
Route::get("/post/{post}/{slug?}",[PostController::class,'show'])->name('post-show');


Route::get("/banners",function (){
    return view('pages.banners');
})->name('banner');

Route::get("/register",[FrontHomeController::class,'show_register'])->name('show_register');
Route::post("/register",[FrontHomeController::class,'register'])->name('register');
