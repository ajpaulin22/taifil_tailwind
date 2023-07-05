<?php

namespace App\Http\Controllers\MasterMaintenance;
use App\Models\m_jobcodes;
use Illuminate\Http\Request;
use App\Models\m_jobcategories;
use App\Models\m_joboperations;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobInformationController extends Controller
{
    public function view(){
        return view("/admin/MasterMaintenance/JobInformation");
    }

    public function GetJobCode(Request $request){
        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        
        $order = "id";
        $query_1 = "SELECT 
        ID,
        Code
         FROM m_jobcodes WHERE IsDeleted = 0 ";
    
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Code LIKE '%".$search."%')";

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

    public function GetJobCategory(Request $request){
        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $order = "id";
        $query_1 = "SELECT
        ID,
        Category
         FROM m_jobcategories WHERE IsDeleted = 0 AND JobCodesID = ".$request->ID;
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Category LIKE '%".$search."%')";
    
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

    public function GetJobOperation(Request $request){
        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $order = "id";
        $query_1 = "SELECT
        ID,
        Operation
         FROM m_joboperations WHERE IsDeleted = 0 AND JobCategoriesID = ".$request->ID;
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  Operation LIKE '%".$search."%')";
    
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
                "JobCodesID" => $request["CodeID"],
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
            ->update(['Category' => $request["CategoryValue"]]);
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
}