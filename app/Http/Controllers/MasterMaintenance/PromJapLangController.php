<?php

namespace App\Http\Controllers\MasterMaintenance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PromJapLangController extends Controller
{
    public function view(){
        return view('admin.MasterMaintenance.PromJapLang');
    }
     public function GetPrometrics(){
        $data = DB::table("prometrics")->select("prometric")->where("isdeleted",0)->get();
        response()->json($data);
     }
}
