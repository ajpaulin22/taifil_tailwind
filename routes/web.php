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
use App\Http\Controllers\client\OnepageController;
use App\Http\Controllers\MasterMaintenanceController;
use App\Http\Controllers\client\JobCategoryController;
use App\Http\Controllers\client\QualificationController;
use App\Http\Controllers\ManagementRegistrationController;
use App\Http\Controllers\MasterMaintenance\JobInformationController;
use App\Http\Controllers\MasterMaintenance\UserInformationController;
use App\Http\Controllers\exportbiodataview;

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

Route::get('/',[OnepageController::class,"view"])->name('home');

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
    Route::post("/contact-form",[OnepageController::class,"contact_form"]);

    Route::group(["prefix"=>"Biodata"],function(){
        Route::get("/",[BiodataController::class,"view"]);
        Route::post("/uploadData",[BiodataController::class,"uploadData"]);
        Route::get("/get-code",[BiodataController::class,"get_code"]);
        Route::get("/get-categories",[BiodataController::class,"get_categories"]);
        Route::get("/get-operations",[BiodataController::class,"get_operations"]);
        Route::post("/upload-image",[BiodataController::class,"upload_image"])->name('client.biodata.upload-image');
        Route::get("/GetPersonalData",[BiodataController::class,"GetPersonalData"]);
    });

    Route::group(["prefix" => "gallery"],function(){
        Route::get("/",[PostController::class,"view"])->name('gallery');
        Route::get("/create-post",[PostController::class,"create_post"])->middleware("auth");
        Route::post("/create",[PostController::class,"create"])->middleware("auth");
        Route::get("/post",[PostController::class,"post"]);
        Route::get("/delete",[PostController::class,"delete"])->middleware("admin");
    });

    Route::group(["prefix" => "qualification"],function(){
        Route::get("/",[QualificationController::class,'view']);
        Route::post("/post-qualification",[QualificationController::class,'post_qualification']);
        Route::get("/get-data",[QualificationController::class,'get_data']);
    });

    Route::group(["prefix" => "jobcategory"],function(){
        Route::get("/",[JobCategoryController::class,'view']);
    });
    Route::group(["prefix" => "contact-us-location"],function(){
        Route::get("/",function(Request $request){
            return view('pages.howto');
        });
    });
});


Route::group(["prefix" => "jp"],function(){
    Route::get('/',[OnepageController::class,"view_jp"])->name('jphome');
    Route::group(["prefix"=>"client"],function(){
        Route::group(["prefix"=>"Biodata"],function(){
            Route::get("/",[BiodataController::class,"view_jp"]);
        });

        Route::group(["prefix" => "gallery"],function(){
            Route::get("/",[PostController::class,"view_jp"])->name('jpgallery');
            Route::get("/create-post",[PostController::class,"create_post_jp"])->middleware("admin");
            Route::get("/post",[PostController::class,"post_jp"]);
        });
    
        Route::group(["prefix" => "qualification"],function(){
            Route::get("/",[QualificationController::class,'view_jp']);
        });
    
        Route::group(["prefix" => "jobcategory"],function(){
            Route::get("/",[JobCategoryController::class,'view_jp']);
        });

        Route::group(["prefix" => "contact-us-location"],function(){
            Route::get("/",function(Request $request){
                return view('jp.pages.howto');
            });
        });
    });
});

Route::group(["middleware" => "admin","prefix" => "admin"],function(){
    Route::group(["prefix" => "ManagementRegistration"],function(){
        Route::get("/",[ManagementRegistrationController::class,'view']);
        Route::get("/GetApplicantData",[ManagementRegistrationController::class,'GetApplicantData']);
        Route::get("/GetPersonalData",[ManagementRegistrationController::class,"GetPersonalData"]);
        Route::post("/SaveInterview",[ManagementRegistrationController::class,"SaveInterview"]);
        Route::get("/GetInterviewHistory",[ManagementRegistrationController::class,"GetInterviewHistory"]);
        Route::post("/DeleteApplicant",[ManagementRegistrationController::class,"DeleteApplicant"]);
        Route::get("/get_code",[ManagementRegistrationController::class,"get_code"]);
        Route::get("/get_categories",[ManagementRegistrationController::class,"get_categories"]);
        Route::get("/get_operations",[ManagementRegistrationController::class,"get_operations"]);
        Route::get('/ExportApplicants',[ManagementRegistrationController::class,'ExportApplicants']);
        Route::get('/ExportBiodata',[ManagementRegistrationController::class,'ExportBiodata']);
        Route::post('/SaveAbroad',[ManagementRegistrationController::class,'SaveAbroad']);
    });

    Route::group(["middleware" => "admin","prefix" => "MasterMaintenance"],function(){
        Route::group(["prefix" => "JobInformation"],function(){
            Route::get("/",[JobInformationController::class,"view"]);
            Route::get("/GetJobCode",[JobInformationController::class,'GetJobCode']);
            Route::get("/GetJobCategory",[JobInformationController::class,'GetJobCategory']);
            Route::get("/GetJobOperation",[JobInformationController::class,'GetJobOperation']);
            Route::get("/GetQualification",[JobInformationController::class,'GetQualification']);
            Route::post("/SaveCode",[JobInformationController::class,'SaveCode']);
            Route::post("/DeleteJobCode",[JobInformationController::class,'DeleteJobCode']);
            Route::post("/SaveCategory",[JobInformationController::class,'SaveCategory']);
            Route::post("/DeleteJobCategory",[JobInformationController::class,'DeleteJobCategory']);
            Route::post("/SaveOperation",[JobInformationController::class,'SaveOperation']);
            Route::post("/DeleteJobOperation",[JobInformationController::class,'DeleteJobOperation']);
            Route::post("/SaveQualification",[JobInformationController::class,'SaveQualification']);
            Route::post("/DeleteJobQualification",[JobInformationController::class,'DeleteJobQualification']);
            Route::post("/SaveHiring",[JobInformationController::class,'SaveHiring']);
        });

        Route::group(["middleware" => "admin","prefix" => "UserInformation"],function(){
            Route::get("/",[UserInformationController::class,"view"]);
            Route::get("/GetUserData",[UserInformationController::class,"GetUserData"]);
            Route::post("/SaveUserData",[UserInformationController::class,"SaveUserData"]);
            Route::get("/GetUserInformation",[UserInformationController::class,"GetUserInformation"]);
            Route::get("/DeleteUser",[UserInformationController::class,"DeleteUser"]);
        });
    });
});

Route::group(["prefix" => "export"],function(){
    Route::get('/',[exportbiodataview::class,"view"]);
});

