<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Index;
use App\Http\Controllers\User\JobappController;
use Illuminate\Support\Facades\Auth;

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
});

// ----For User-----
// Route::get("admin/user/{id?}/comment/{comment?}" , function($id=null,$comment=null)
// {
//     return "Hello From user page and thid ID is " . $id . " and thid comment is " . $comment;
// })->where(["id" => "[0-9]+"]); //from 0 to 9 or above 9

// Route::get("product" , function()
// {
//     return "Hello From Product page";
// });

// Route::get("category" , function()
// {
//     return "Hello From Category page";
// });

Route::get("/user" ,[Index::class , 'index']);

Route::prefix("user")->group(function(){
    Route::resource("/jobreq" , JobappController::class);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
