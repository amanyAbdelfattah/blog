<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\JobappController;
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

Route::get("/admin" , [DashboardController::class , 'index']);
// -----Admin Pannel-----
Route::prefix("admin")->group(function(){

    Route::resource("/user" , UserController::class);
    Route::resource("/post" , PostController::class);
    Route::resource("/jobapp" , JobappController::class);
});

