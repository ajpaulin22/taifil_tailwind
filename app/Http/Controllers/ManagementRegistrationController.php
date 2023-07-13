<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\ExportUser;
use Illuminate\Http\Request;
use App\Exports\ExportBiodata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\m_interviewhistories;
use Maatwebsite\Excel\Facades\Excel;

class ManagementRegistrationController extends Controller
{
    public function view(){
        return view("/admin/ManagementRegistration");
    }

    public function GetApplicantData(Request $request){
        $sorCol = $request['columns'][$request['order.0.column']]['data'];
        $sorDir = $request["order.0.dir"];
        $start = $request["start"];
        $length = $request["length"];
        $search = $request["search.value"];
        $sql = "call biodata_getdata('".($request['Type'] == null ? '' : $request['Type']) . "', '". ($request['Category'] == null ? '' : $request['Category']). "', '". ($request['Operations'] == null ? '' : $request['Operations']). "', ". ($request['AgeFrom'] == null ? 0 : $request['AgeFrom']). ", ". ($request['AgeTo'] == null ? 0 : $request['AgeTo']) .", '" . $sorCol."', '" . $sorDir."', " . $start.", " . $length. ", '". $search ."')";
        $data = collect(DB::select(DB::raw($sql)));
        $totalRowCount = DB::table('personal_datas')
                        ->where("IsDeleted",0)
                        ->select()->Get();
        $totalRowCount = (count($totalRowCount) > 0 ? count($totalRowCount): 0);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRowCount,
            'recordsFiltered' => $totalRowCount,
            'data' => $data
        ];
        return json_encode($json_data);
    }
    // function get_multi_result_set($conn, $statement)
    // {
    //     $results = [];
    //     $pdo = DB::connection($conn)->getPdo();
    //     $result = $pdo->prepare($statement);
    //     $result->execute();
    //     do {
    //         $resultSet = [];
    //         foreach ($result->fetchall(PDO::FETCH_ASSOC) as $res) {
    //             array_push($resultSet, $res);
    //         }
    //         array_push($results, $resultSet);
    //     } while ($result->nextRowset());

    //     return $results;
    // }

    public function GetPersonalData(Request $request){
        $data = DB::table('personal_datas')
        ->where("id",$request->PersonalInfoID)
        ->where("IsDeleted",0)

        ->select()->Get();

        session(['personaldata' => $data]);
        return $data;
    }

    public function SaveInterview(Request $request){
        for ($i = 0; $i < COUNT($request["PersonalID"]); $i++){
            m_interviewhistories::create([
                "PersonalInfoID" => $request["PersonalID"][$i]["ID"],
                "AttendInterview" => $request["AttendInterview"],
                "InterviewDate" => $request["InterviewDate"],
                "Company" => $request["Company"],
                "IsDeleted" => 0,
                "CreateID" => "admin",
                "UpdateID" => "admin"
            ]);
        }

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
        $IDs = "0";
        if($request["applicantID"] != 0){
            $IDs = "";
            for($i = 0; $i < COUNT($request["applicantID"]); $i++){
                $IDs = $IDs . "," . $request["applicantID"][$i]["ID"];
            }
            $IDs = ltrim($IDs, ',');
        }
        
        $sorCol = $request['columns'][$request['order.0.column']]['data'];
        $applicantID = $request["applicantID"];
        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        
        $order = "id";
        $query_1 = "SELECT p.ID, CONCAT(first_name, ' ', last_name) as Name, m.AttendInterview, m.InterviewDate, m.Company
                FROM personal_datas p
                JOIN m_interviewhistories m ON p.ID = m.PersonalInfoID WHERE m.IsDeleted = 0 AND p.isdeleted = 0 AND p.ID IN (" . $IDs . ")";
        $query_1 .= " 
        AND  (Company LIKE '%".$search."%'
            OR first_name LIKE '%".$search."%'
            OR last_name LIKE '%".$search."%'
            OR InterviewDate LIKE '%".$search."%') order by ". $sorCol . " " . $dir;
        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);
        $data2 = DB::select($query_1);
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

    public function DeleteApplicant(Request $request){
        $IDs = [];
        for ($i = 0; $i < count($request["ID"]); $i++){
            array_push($IDs,$request["ID"][$i]["ID"]);
        }

        DB::table('personal_datas')
            ->whereIN('id', $IDs)
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
     public function get_categories(Request $request){
         $data = DB::table('m_jobcategories')
         ->where("IsDeleted",0)
         ->orderby('Category', 'asc')
         ->select()->Get();
         return $data;
     }
 
     public function get_operations(Request $request){
         $data = DB::table('m_joboperations')
         ->where("IsDeleted",0)
         ->orderby('Operation', 'asc')
         ->select()->Get();
         return $data;
     }

     public function ExportApplicants(Request $request){
        $date = Carbon::now();
        $date->toDateTimeString();
        return Excel::download(new ExportUser($request), 'users'. $date .'.xlsx');
     }
     public function SaveAbroad(Request $request){
        $date = Carbon::now();
        $date->toDateTimeString();
        $IDInsertAbroad = [];
        $IDRemoveAbroad = [];
        for ($i = 0; $i < count($request["PersonalID"]); $i++){
            if($request["PersonalID"][$i]["Value"] == 1){
                array_push($IDInsertAbroad, $request["PersonalID"][$i]["ID"]);
            }
            DB::table('personal_datas')
            ->whereIN('id', $IDInsertAbroad)
            ->update([
                'to_abroad' => 1
                ,'abroad_date' => $date
            ]);
        }
        for ($i = 0; $i < count($request["PersonalID"]); $i++){
            if($request["PersonalID"][$i]["Value"] == 0){
                array_push($IDRemoveAbroad, $request["PersonalID"][$i]["ID"]);
            }
            DB::table('personal_datas')
            ->whereIN('id', $IDRemoveAbroad)
            ->update([
                'to_abroad' => 0
                ,'abroad_date' => null
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

    //  public function ExportBiodata(Request $request){
    //     $date = Carbon::now();
    //     $date->toDateTimeString();
    //     return Excel::download(new ExportBiodata($request), 'Biodata'. $date .'.xlsx');
    //  }

     public function ExportBiodata(Request $req){
        // try {
        //     $data = DB::table('shipments')->where('id',$req->id)->select()->get()->toArray();
        //     $pdf = Pdf::loadView('export', $data);
        //     return $pdf->stream($control.'_system_report.pdf');
        // } catch (\Throwable $th) {
        //  $data = [
        //      'msg' => $th->getMessage(),
        //      'data' => [],
        //      'success' => false,
        //      'msgType' => 'error',
        //      'msgTitle' => 'Error!'
        //  ];
        //  return response()->json($data);
        // }
 
     }
}