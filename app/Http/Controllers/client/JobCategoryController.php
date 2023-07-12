<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\m_jobcategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JobCategoryController extends Controller
{
    public function view(Request $request){
        $cat = DB::table('m_jobcategories')->where('isDeleted',0)->where('JobType',strtoupper($request->data))->select()->get();

        return view('pages.jobcategory',["id"=>$request->data,"cat"=>$cat,"category"=>$request->category]);
    }
}
