<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\qualification_content;

class QualificationController extends Controller
{
    public function view(Request $request){
        return view('pages.qualification',["id"=>$request->data]);
    }

    public function post_qualification(Request $request){
        // qualification_content::created();
    }
}
