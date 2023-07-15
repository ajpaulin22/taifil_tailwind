<?php

namespace App\Http\Controllers\MasterMaintenance;
use App\Models\m_jobcodes;
use Illuminate\Http\Request;
use App\Models\m_jobcategories;
use App\Models\m_joboperations;
use App\Models\m_jobqualifications;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view(){
        return view("/admin/MasterMaintenance/JobInformation");
    }

    // public function GetJobCode(Request $request){
    //     $limit = $request->length;
    //     $start = $request->start;
    //     $order111 = $request->input('order.0.column');
    //     // dd($request);
    //     $dir = $request->input('order.0.dir');
    //     $search = $request->input('search.value');
    //     $order = "id";
    //     $query_1 = "SELECT
    //     ID,
    //     Code
    //      FROM m_jobcodes WHERE IsDeleted = 0 ";

    //     $query_1 .= "
    //     AND  (
    //     CAST(id as char(200)) LIKE '%".$search."%'
    //     OR  Code LIKE '%".$search."%') order by Code " .$dir;
    //     $query_1 .= " limit ".$limit." offset ".$start;
    //     $data = DB::select($query_1);
    //     $total_result = (count($data) > 0 ? count($data): 0);
    //     $totalFiltered = (count($data) > 0 ? count($data): 0);
    //     $json_data = [
    //         'draw' => intval($request->draw),
    //         'recordsTotal' => $total_result,
    //         'recordsFiltered' => $totalFiltered,
    //         'data' => $data
    //     ];
    //     return json_encode($json_data);
    // }

    public function GetJobCategory(Request $request){
        $limit = $request->length;
        $start = $request->start;
        $col = $request["columns"][$request["order.0.column"]]["data"];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $query_1 = "SELECT
        ID,
        JobType,
        Category
         FROM m_jobcategories WHERE IsDeleted = 0";
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Category LIKE '%".$search."%'
        OR  JobType LIKE '%".$search."%') order by ". $col . " " . $dir;
    
        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);
        $query_2 = "SELECT * FROM m_jobcategories where IsDeleted = 0";
        $data2 = DB::select($query_2);

        $total_result = (count($data2) > 0 ? count($data2): 0);
        $totalFiltered = (count($data2) > 0 ? count($data2): 0);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_result,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ];
        return json_encode($json_data);
    }

    public function GetJobOperation(Request $request){
        $limit = $request->length;
        $start = $request->start;
        $col = $request["columns"][$request["order.0.column"]]["data"];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $query_1 = "SELECT
        ID,
        Operation,
        Hiring
         FROM m_joboperations WHERE IsDeleted = 0 AND JobCategoriesID = ".$request->ID;
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Operation LIKE '%".$search."%') order by " .$col . " " .$dir;
    
        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);
        $query_2 = "SELECT * FROM m_joboperations where IsDeleted = 0 AND JobCategoriesID = ".$request->ID;
        $data2 = DB::select($query_2);
        $total_result = (count($data2) > 0 ? count($data2): 0);
        $totalFiltered = (count($data2) > 0 ? count($data2): 0);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_result,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ];
        return json_encode($json_data);
    }

    public function GetQualification(Request $request){
        $limit = $request->length;
        $start = $request->start;
        $col = $request["columns"][$request["order.0.column"]]["data"];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $query_1 = "SELECT
        ID,
        Qualification
         FROM m_jobqualifications WHERE IsDeleted = 0 AND JobOperationsID = ".$request->ID;
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Qualification LIKE '%".$search."%') order by " . $col . " " .$dir;
        
        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);
        $query_2 = "SELECT * FROM m_jobqualifications where IsDeleted = 0 AND JobOperationsID = " .$request->ID;
        $data2 = DB::select($query_2);
        $total_result = (count($data2) > 0 ? count($data2): 0);
        $totalFiltered = (count($data2) > 0 ? count($data2): 0);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total_result,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ];
        return json_encode($json_data);
    }

    public function SaveCode(Request $request){
        
        // $flight = App\Flight::updateOrCreate(
        //     ['departure' => 'Oakland', 'destination' => 'San Diego'],
        //     ['price' => 99]
        // );
        $msg = "";
        if($request["ID"] == 0){
            m_jobcodes::create([
                "Code" => $request["Code"],
                "IsDeleted" => 0,
                "CreateID" => "admin",
                "UpdateID" => "admin"
            ]);
            $msg = 'Job Code Saved Successfully';
        }
        else{
            DB::table('m_jobcodes')
            ->where('id', $request["ID"])
            ->update(['Code' => $request["Code"]]);

            $msg = 'Job Code Saved Successfully';
        }
        $data = [
            'msg' =>  $msg,
            'data' => [],
            'success' => true,
            'msgType' => 'success',
            'msgTitle' => 'Success!'
        ];
        return response()->json($data);
    }

    public function DeleteJobCode(Request $request){
        $IDs = [];
        for ($i = 0; $i < count($request["ID"]); $i++){
            array_push($IDs,$request["ID"][$i]["ID"]);

        }

        DB::table('m_jobcodes')
            ->whereIN('ID', $IDs)
            ->update(['IsDeleted' => 1]);

            $data = [
                'msg' =>  "Job Code Deleted Successfully",
                'data' => [],
                'success' => true,
                'msgType' => 'success',
                'msgTitle' => 'Success!'
            ];
            return response()->json($data);
    }
    
    public function SaveCategory(Request $request){
    
        $msg = "";
        // dd($request["CodeID"]);
        if($request["CategoryID"] == 0){
            m_jobcategories::create([
                "JobType" => $request["JobType"],
                "Category" => $request["CategoryValue"],
                "IsDeleted" => 0,
                "CreateID" => "admin",
                "UpdateID" => "admin"
            ]);
            $msg = 'Job Category Saved Successfully';
        }
        else{
            DB::table('m_jobcategories')
            ->where('id', $request["CategoryID"])
            ->update(['Category' => $request["CategoryValue"]
                    ,'JobType' => $request["JobType"]
            ]);
            $msg = 'Job Category Updated Successfully';
        }
        $data = [
            'msg' =>  $msg,
            'data' => [],
            'success' => true,
            'msgType' => 'success',
            'msgTitle' => 'Success!'
        ];
        return response()->json($data);
    }

    public function DeleteJobCategory(Request $request){
        $IDs = [];
        for ($i = 0; $i < count($request["ID"]); $i++){
            array_push($IDs,$request["ID"][$i]["ID"]);

        }
        
        DB::table('m_jobcategories')
            ->whereIN('ID', $IDs)
            ->update(['IsDeleted' => 1]);

            $data = [
                'msg' =>  "Job Code Deleted Successfully",
                'data' => [],
                'success' => true,
                'msgType' => 'success',
                'msgTitle' => 'Success!'
            ];
            return response()->json($data);
    }

    public function SaveOperation(Request $request){
    
        $msg = "";
        
        if($request["OperationID"] == 0){
            m_joboperations::create([
                "JobCategoriesID" => $request["CategoryID"],
                "Operation" => $request["OperationValue"],
                "IsDeleted" => 0,
                "CreateID" => "admin",
                "UpdateID" => "admin"
            ]);
            $msg = 'Job Operation Saved Successfully';
        }
        else{
            DB::table('m_joboperations')
            ->where('id', $request["OperationID"])
            ->update(['Operation' => $request["OperationValue"]]);
            $msg = 'Job Operation Updated Successfully';
        }
        $data = [
            'msg' =>  $msg,
            'data' => [],
            'success' => true,
            'msgType' => 'success',
            'msgTitle' => 'Success!'
        ];
        return response()->json($data);
    }
    
    public function DeleteJobOperation(Request $request){
        $IDs = [];
        for ($i = 0; $i < count($request["ID"]); $i++){
            array_push($IDs,$request["ID"][$i]["ID"]);

        }
        
        DB::table('m_joboperations')
            ->whereIN('ID', $IDs)
            ->update(['IsDeleted' => 1]);

            $data = [
                'msg' =>  "Job Operation Deleted Successfully",
                'data' => [],
                'success' => true,
                'msgType' => 'success',
                'msgTitle' => 'Success!'
            ];
            return response()->json($data);
    }

    public function SaveQualification(Request $request){
    
        $msg = "";
        if($request["QualificationID"] == 0){
            m_jobqualifications::create([
                "JobOperationsID" => $request["OperationID"],
                "Qualification" => $request["QualificationValue"],
                "IsDeleted" => 0,
                "CreateID" => "admin",
                "UpdateID" => "admin"
            ]);
            $msg = 'Job Operation Saved Successfully';
        }
        else{
            DB::table('m_jobqualifications')
            ->where('id', $request["QualificationID"])
            ->update(['Qualification' => $request["QualificationValue"]]);
            $msg = 'Job Qualification Updated Successfully';
        }
        $data = [
            'msg' =>  $msg,
            'data' => [],
            'success' => true,
            'msgType' => 'success',
            'msgTitle' => 'Success!'
        ];
        return response()->json($data);
    }

    public function DeleteJobQualification(Request $request){
        $IDs = [];
        for ($i = 0; $i < count($request["ID"]); $i++){
            array_push($IDs,$request["ID"][$i]["ID"]);
        }

        DB::table('m_jobqualifications')
            ->whereIN('ID', $IDs)
            ->update(['IsDeleted' => 1]);

            $data = [
                'msg' =>  "Job Qualification Deleted Successfully",
                'data' => [],
                'success' => true,
                'msgType' => 'success',
                'msgTitle' => 'Success!'
            ];
            return response()->json($data);
    }
    
    public function SaveHiring(Request $request){
        $IDInsertHiring = [];
        $IDRemoveHiring = [];
        for ($i = 0; $i < count($request["PersonalID"]); $i++){
            if($request["PersonalID"][$i]["Value"] == 1){
                array_push($IDInsertHiring, $request["PersonalID"][$i]["ID"]);
            }
            DB::table('m_joboperations')
            ->whereIN('id', $IDInsertHiring)
            ->update([
                'Hiring' => 1
            ]);
        }
        for ($i = 0; $i < count($request["PersonalID"]); $i++){
            if($request["PersonalID"][$i]["Value"] == 0){
                array_push($IDRemoveHiring, $request["PersonalID"][$i]["ID"]);
            }
            DB::table('m_joboperations')
            ->whereIN('id', $IDRemoveHiring)
            ->update([
                'Hiring' => 0
            ]);
        }
        $data = [
            'msg' =>  "Abroad Information Updated Successfully",
            'data' => [],
            'success' => true,
            'msgType' => 'success',
            'msgTitle' => 'Success!'
        ];
        return response()->json($data);
    }
}