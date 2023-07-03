<?php

use Carbon\Carbon;
use App\Models\post;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Auth\RequestGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\client\PostController;
use App\Http\Controllers\client\BiodataController;
use App\Http\Controllers\MasterMaintenanceController;
use App\Http\Controllers\ManagementRegistrationController;
use App\Http\Controllers\MasterMaintenance\JobInformationController;
use App\Http\Controllers\MasterMaintenance\UserInformationController;

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
    $posts = post::select()->where("isdeleted",0)->orderby('id','desc')->limit(3)->get();
                $data = $posts->map(function($post,$key){
                    return [
                        "id" => $post->id,
                        "title" => $post->title,
                        "content" => $post->content,
                        "category" => $post->category,
                        "date" => date('m/d/Y' ,strtotime($post->created_at)),
                        "time" => Carbon::parse($post->created_at)->format('g:i a'),
                        "images" => image::select('path')->where("post_id",$post->id)->limit(1)->get()->toArray()
                    ];
                });

     $departure = [
        "january" => 21,
        "february" => 12,
        "march" => 23,
        "april" => 10,
        "may" => 14,
        "june" => 16,
        "july" => 1,
        "august" => 0,
        "september" => 0,
        "october" => 0,
        "november" => 0,
        "december" => 0,

     ];
     return view('welcome',['data'=>$data, "departure" => $departure]);
})->name('home');

Route::get('/admin', function(){
    if(Auth::check()){
        return redirect('/admin/ManagementRegistration');
    }else{
        return redirect('/auth/login');
    }
})->name('admin');

Route::group(['middleware' => 'guest','prefix'=>'auth'],function(){
    Route::get('/login',[AuthController::class,'loginView']);
    Route::post('/signin',[AuthController::class,'login']);

    Route::get('/register',[AuthController::class,'registerView']);
    Route::post('/create',[AuthController::class,'register']);
});

Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::group(["prefix"=>"client"],function(){
    Route::group(["prefix"=>"Biodata"],function(){
        Route::get("/",[BiodataController::class,"view"]);
        Route::post("/uploadData",[BiodataController::class,"uploadData"]);
        Route::get("/get-code",[BiodataController::class,"get_code"]);
        Route::get("/get-categories",[BiodataController::class,"get_categories"]);
        Route::get("/get-operations",[BiodataController::class,"get_operations"]);
        Route::post("/upload-image",[BiodataController::class,"upload_image"])->name('client.biodata.upload-image');
    });

    Route::group(["prefix" => "gallery"],function(){
        Route::get("/",[PostController::class,"view"])->name('gallery');
        Route::get("/create-post",[PostController::class,"create_post"])->middleware("admin");
        Route::post("/create",[PostController::class,"create"])->middleware("admin");
        Route::get("/post",[PostController::class,"post"]);
        Route::get("/delete",[PostController::class,"delete"])->middleware("admin");
    });

    Route::group(["prefix" => "qualification"],function(){
        Route::get("/",function(Request $request){
            return view('pages.qualification',["id"=>$request->data]);
        });
    });

    Route::group(["prefix" => "jobcategory"],function(){
        Route::get("/",function(Request $request){
            return view('pages.jobcategory',["id"=>$request->data]);
        });
    });
});

Route::group(["middleware" => "admin","prefix" => "admin"],function(){
    Route::group(["prefix" => "ManagementRegistration"],function(){
        Route::get("/",[ManagementRegistrationController::class,'view']);
        Route::get("/GetApplicantData",[ManagementRegistrationController::class,'GetApplicantData']);
    });

    Route::group(["middleware" => "admin","prefix" => "MasterMaintenance"],function(){
        Route::group(["prefix" => "JobInformation"],function(){
            Route::get("/",[JobInformationController::class,"view"]);
            Route::get("/GetJobCode",[JobInformationController::class,'GetJobCode']);
            Route::get("/GetJobCategory",[JobInformationController::class,'GetJobCategory']);
            Route::get("/GetJobOperation",[JobInformationController::class,'GetJobOperation']);
            Route::post("/SaveCode",[JobInformationController::class,'SaveCode']);
            Route::post("/DeleteJobCode",[JobInformationController::class,'DeleteJobCode']);
            Route::post("/SaveCategory",[JobInformationController::class,'SaveCategory']);
            Route::post("/DeleteJobCategory",[JobInformationController::class,'DeleteJobCategory']);
            Route::post("/SaveOperation",[JobInformationController::class,'SaveOperation']);
            Route::post("/DeleteJobOperation",[JobInformationController::class,'DeleteJobOperation']);
        });

        Route::group(["middleware" => "admin","prefix" => "UserInformation"],function(){
            Route::get("/",[UserInformationController::class,"view"]);
            Route::get("/GetUserData",[UserInformationController::class,"GetUserData"]);
        });
    });
});