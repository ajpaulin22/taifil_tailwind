<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\m_interviewhistories;

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

    public function SaveInterview(Request $request){
        m_interviewhistories::create([
            "PersonalInfoID" => $request["PersonalID"],
            "AttendInterview" => $request["AttendInterview"],
            "InterviewDate" => $request["InterviewDate"],
            "Company" => $request["Company"],
            "IsDeleted" => 0,
            "CreateID" => "admin",
            "UpdateID" => "admin"
        ]);

        $data = [
            'msg' =>  'Interview Saved Successfully',
            'data' => [],
            'success' => true,
            'msgType' => 'success',
            'msgTitle' => 'Success!'
        ];
        return response()->json($data);
    }

    public function GetInterviewHistory(Request $request){
        $applicantID = $request["applicantID"];
        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        
        $order = "id";
        $query_1 = "SELECT *
         FROM m_interviewhistories WHERE IsDeleted = 0 AND PersonalInfoID = " .$applicantID;
    
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Company LIKE '%".$search."%')";

        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);
        $total_result = (count($data) > 0 ? count($data): 0);
        $totalFiltered = (count($data) > 0 ? count($data): 0);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_result,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ];
        return json_encode($json_data);
    }
}