<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\RelationsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CatController;
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
Route::get("/admin" , "Admin\DashboardController@index")->middleware('auth','check.admin')->name('admin-view');

// -----Admin Pannel-----
Route::middleware('auth','check.admin')->prefix("admin")->group(function(){

    // Route::post('accept/{id}', 'Admin\UserController@approve');
    Route::resource("/user" , 'Admin\UserController');
    Route::resource("/post" , 'Admin\PostController');
    Route::resource('/jobreq' , 'Admin\ApplicantController');
    Route::resource('/service' , 'Admin\ServiceController');
    Route::resource('/categories' , 'Admin\CatController');
    Route::resource('/order' , 'Admin\OrderController');
    Route::get('image-upload', 'Admin\ServiceController@imageUpload')->name('image.upload');
    Route::get('/user-has-many' , 'RelationsController@UserhasMany');
    Route::get('/user-has-many-reverse' , 'RelationsController@UserhasManyReverse');
});