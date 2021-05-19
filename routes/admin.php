<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\RelationsController;
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
Route::get("/admin" , "Admin\DashboardController@index");

// -----Admin Pannel-----
Route::prefix("admin")->group(function(){

    Route::resource("/user" , 'Admin\UserController');
    Route::resource("/post" , 'Admin\PostController');
    Route::get('/jobreq' , 'Admin\ApplicantController@index');
    // Route::get('/{id}', [
    //     'as' => 'test',
    //     'uses' => 'Admin\ApplicantController@test',
    // ]);
    Route::get('/user-has-many' , 'RelationsController@UserhasMany');
    Route::get('/user-has-many-reverse' , 'RelationsController@UserhasManyReverse');
});

