<?php

namespace App\Http\Controllers\MasterMaintenance;

use App\Models\m_jobcategories;
use App\Models\m_jobcodes;
use App\Models\m_joboperations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class JobInformationController extends Controller
{
    public function view(){
        return view("/admin/MasterMaintenance/JobInformation");
    }

    public function GetJobCode(Request $request){
        if($request["search"]["value"] == null){
            $condition = ["IsDeleted" => 0];
            $data = m_jobcodes::where($condition)->select("ID","Code")->get();
        }
        else{
            $condition = ["IsDeleted" => 0, "Code" => $request["search"]["value"]];
            $data = m_jobcodes::where($condition)->select("ID","Code")->get();
        }
        return DataTables::of($data)->addIndexColumn()->make(true);
    }

    public function GetJobCategory(Request $request){
        if($request["search"]["value"] == null){
            $condition = ["IsDeleted" => 0, "JobCodesID" => $request["ID"]];
            $data = m_jobcategories::where($condition)->select("ID","Category")->get();
        }
        else{
            $condition = ["IsDeleted" => 0, "JobCodesID" => $request["ID"], "Category" => $request["search"]["value"]];
            $data = m_jobcategories::where($condition)->select("ID","Category")->get();
        }
        return DataTables::of($data)->addIndexColumn()->make(true);
    }

    public function GetJobOperation(Request $request){
        if($request["search"]["value"] == null){
            $condition = ["IsDeleted" => 0, "JobCategoriesID" => $request["ID"]];
            $data = m_joboperations::where($condition)->select("ID","Operation")->get();
        }
        else{
            $condition = ["IsDeleted" => 0, "JobCategoriesID" => $request["ID"], "Operation" => $request["search"]["value"]];
            $data = m_joboperations::where($condition)->select("ID","Operation")->get();
        }
        return DataTables::of($data)->addIndexColumn()->make(true);
    }
}