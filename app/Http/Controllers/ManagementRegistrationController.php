<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementRegistrationController extends Controller
{
    public function view(){
        return view("/admin/ManagementRegistration");
    }

    public function GetApplicantData(Request $request){
        $sql = "call biodata_getdata()";

        $data = collect(DB::select(DB::raw($sql)));
        $total_result = (count($data) > 0 ? count($data): 0);
        $totalFiltered = (count($data) > 0 ? count($data): 0);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_result,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ];
        // dd($data);
        return json_encode($json_data);
    }

    public function GetPersonalData(Request $request){
        $data = DB::table('personal_datas')
        ->where("id",$request->PersonalInfoID)
        ->where("IsDeleted",0)
        ->select()->Get();

        session(['personaldata' => $data]);
        return $data;
    }
}