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
     public function GetPrometrics(Request $request){
    
        $data = DB::table("prometrics")->select("prometric")->where("isdeleted",0);
        return Datatables::of($data)->make(true);
     }

     public function GetJaplang(){
        $data = DB::table("japlangs")->select("jap_lang")->where("isdeleted",0);
        return Datatables::of($data)->make(true);
     }
}
