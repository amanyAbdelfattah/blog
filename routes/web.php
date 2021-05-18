<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    Route::get('test',function(){
		return view('admin.dashboard');
	});
});

Route::get("/user" ,'User\Index@index');

Route::prefix("user")->group(function(){
    Route::resource("/jobapp" , 'User\JobappController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
