<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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




Route::get('/admin', function(){
    if(Auth::check()){
        return redirect('/');
    }else{
        return redirect('/auth/login');
    }
});


Route::group(['middleware' => 'guest','prefix'=>'auth'],function(){
    Route::get('/login',[AuthController::class,'loginView']);
    Route::post('/signin',[AuthController::class,'login']);

    Route::get('/register',[AuthController::class,'registerView']);
    Route::post('/create',[AuthController::class,'register']);
});

Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');
