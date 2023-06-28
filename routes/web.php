<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagementRegistrationController;
use App\Http\Controllers\MasterMaintenance\JobInformationController;
use App\Http\Controllers\MasterMaintenance\UserInformationController;
use App\Http\Controllers\MasterMaintenanceController;

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
        return redirect('/admin/ManagementRegistration');
    }else{
        return redirect('/auth/login');
    }
})->name("admin");

Route::group(['middleware' => 'guest','prefix'=>'auth'],function(){
    Route::get('/login',[AuthController::class,'loginView']);
    Route::post('/signin',[AuthController::class,'login']);

    Route::get('/register',[AuthController::class,'registerView']);
    Route::post('/create',[AuthController::class,'register']);
});

Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::group(["middleware" => "auth","prefix" => "admin"],function(){
    Route::group(["prefix" => "ManagementRegistration"],function(){
        Route::get("/",[ManagementRegistrationController::class,'view']);
        Route::get("/get_data",[ManagementRegistrationController::class,'get_data']);
    });

    Route::group(["prefix" => "MasterMaintenance"],function(){
        Route::group(["prefix" => "JobInformation"],function(){
            Route::get("/",[JobInformationController::class,"view"]);
            Route::get("/GetJobCode",[JobInformationController::class,'GetJobCode']);
        });

        Route::group(["prefix" => "UserInformation"],function(){
            Route::get("/",[UserInformationController::class,"view"]);
        });
    });
});