<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\ExportUser;
use Illuminate\Http\Request;
use App\Exports\ExportBiodata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\m_interviewhistories;
use App\Models\m_joboperations;
use Maatwebsite\Excel\Facades\Excel;

class ManagementRegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view(){
        return view("/admin/ManagementRegistration");
    }

    public function GetApplicantData(Request $request){
        // dd($request);
        $sorCol = $request['columns'][$request['order.0.column']]['data'];
        $sorDir = $request["order.0.dir"];
        $start = $request["start"];
        $length = $request["length"];
        $search = $request["search.value"];
        $sql = "call biodata_getdata('".($request['Type'] == null ? '' : $request['Type']) . "', '". ($request['Category'] == null ? '' : $request['Category']). "', '". ($request['Operations'] == null ? '' : $request['Operations']). "', ". ($request['AgeFrom'] == null ? 0 : $request['AgeFrom']). ", ". ($request['AgeTo'] == null ? 0 : $request['AgeTo']) .", '" . $sorCol."', '" . $sorDir."', " . $start.", " . $length. ", '". $search ."')";
        $data = collect(DB::select(DB::raw($sql)));

        $sql = "SELECT * from personal_datas where isdeleted = 0 "
                        .($request['Type'] == null ? "" : " AND job_type = '". $request['Type'] ."' ")
                        .($request['Category'] == null ? "" : " AND job_cat = '". $request['Category'] ."' ")
                        .($request['operation'] == null ? "" : " AND job_operation = '". $request['operation'] ."' ")
                        ." AND Age BETWEEN " . ($request["AgeFrom"] == null ? 0 : $request["AgeFrom"]) . " AND " . ($request["AgeTo"] == null ? 100 : $request["AgeTo"]);
        $totalRowCount = collect(DB::select(DB::raw($sql)));
        $totalRowCount = (count($data) > 0 ? count($totalRowCount): 0);
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
        session(['personaldata' => $data[0]->id]);
        unset($data[0]->id_picture);
        unset($data[0]->gov_id_picture);
        unset($data[0]->passport_id_picture);
        return $data;
    }

    public function SaveInterview(Request $request){
        for ($i = 0; $i < COUNT($request["PersonalID"]); $i++){
            m_interviewhistories::create([
                "PersonalInfoID" => $request["PersonalID"][$i]["ID"],
                "AttendInterview" => $request["AttendInterview"],
                "InterviewDate" => $request["InterviewDate"],
                "Status" => $request["Status"],
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
        $limit = $request->length;
        $start = $request->start;
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $query_1 = "SELECT p.ID, CONCAT(first_name, ' ', last_name) as Name, m.AttendInterview, DATE_FORMAT(m.InterviewDate, '%m/%d/%Y') as InterviewDate, m.Status, m.Company
                FROM personal_datas p
                JOIN m_interviewhistories m ON p.ID = m.PersonalInfoID WHERE m.IsDeleted = 0 AND p.isdeleted = 0 AND p.ID IN (" . $IDs . ")";
        $query_1 .= " 
        AND  (Company LIKE '%".$search."%'
            OR AttendInterview LIKE '%".$search."%'
            OR first_name LIKE '%".$search."%'
            OR last_name LIKE '%".$search."%'
            OR Status LIKE '%".$search."%'
            OR InterviewDate LIKE '%".$search."%') order by ". $sorCol . " " . $dir;
        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);

        // if (COUNT($data) != 0){
        //     $data[0]->InterviewDate = date('m/d/Y', strtotime(explode(" ", $data[0]->InterviewDate)[0]));
        // }
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
        $data = DB::select('select DISTINCT ID, Category from m_jobcategories where IsDeleted = 0 order by Category asc');
         return $data;
     }

     public function get_operations(Request $request){

        $data = DB::select('select DISTINCT ID, Operation from m_joboperations where IsDeleted = 0 order by Operation asc');
        return $data;
     }

     public function ExportApplicants(Request $request){
        $date = Carbon::now();
        $date->toDateTimeString();
        return Excel::download(new ExportUser($request), 'Applicants_Biodata_'. $date .'.xlsx');
     }
     public function SaveAbroad(Request $request){
        $date = Carbon::now();
        $date->toDateTimeString();
        for ($i = 0; $i < count($request["PersonalID"]); $i++){
            if($request["PersonalID"][$i]["Value"] == 1)
            {
                DB::table('personal_datas')
                ->where('id', $request["PersonalID"][$i]["ID"])
                ->update([
                    'to_abroad' => 1
                    ,'abroad_date' => $request["PersonalID"][$i]["AbroadDate"]
                ]);
            }
            else{
                DB::table('personal_datas')
                ->where('id', $request["PersonalID"][$i]["ID"])
                ->update([
                    'to_abroad' => 0
                    ,'abroad_date' => null
                ]);
            }
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

     public function ExportBiodata(Request $request){
        $data = [];
        $date = Carbon::now();
        $date->toDateTimeString();
        $query = "Select *, c.Category, o.Operation from personal_datas p"
                ." LEFT JOIN m_jobcategories c ON p.job_cat = c.ID"
                ." LEFT JOIN m_joboperations o ON p.operation = o.ID"
                ." WHERE p.ID = " . $request["IDs"] . " AND p.isdeleted = 0";
        $dataPersonal = DB::select($query);
        $dataPersonal[0]->id_picture = base64_encode($dataPersonal[0]->id_picture);
        $dataPersonal[0]->gov_id_picture = base64_encode($dataPersonal[0]->gov_id_picture);
        $dataPersonal[0]->passport_id_picture = base64_encode($dataPersonal[0]->passport_id_picture);
        if($dataPersonal[0]->job_type == "SSW"){
            $query = "Select * from certificatejobs where isdeleted = 0 AND personal_id = " . $request["IDs"];
            $dataCertificate = DB::select($query);
            $query = "Select * from prometric_datas where isdeleted = 0 AND certificate_id = " . $dataCertificate[0]->id;
            $dataPrometric = DB::select($query);
            $query = "Select * from jpl_datas where isdeleted = 0 AND certificate_id = " . $dataCertificate[0]->id;
            $dataLanguage = DB::select($query);
        }
        $query = "Select * from educational_datas where isdeleted = 0 AND personal_id = " . $request["IDs"];
        $dataEducational = DB::select($query);
        $query = "Select * from vocational_datas where isdeleted = 0 AND educational_id = " . $dataEducational[0]->id;
        $dataVocational = DB::select($query);
        $query = "Select * from local_emps where isdeleted = 0 AND personal_id = " . $request["IDs"];
        $dataLocal = DB::select($query);
        $query = "Select * from abroad_emps where isdeleted = 0 AND personal_id = " . $request["IDs"];
        $dataAbroad = DB::select($query);
        $query = "Select * from family_datas where isdeleted = 0 AND personal_id = " . $request["IDs"];
        $dataFamily = DB::select($query);
        $query = "Select * from japanvisit_datas where isdeleted = 0 AND family_id = " . $dataFamily[0]->id;
        $dataVisit = DB::select($query);
        $query = "Select * from sibling_datas where isdeleted = 0 AND family_id = " . $dataFamily[0]->id;
        $dataSiblings = DB::select($query);
        $query = "Select * from children_datas where isdeleted = 0 AND family_id = " . $dataFamily[0]->id;
        $dataChildren = DB::select($query);
        $query = "Select * from relative_datas where isdeleted = 0 AND family_id = " . $dataFamily[0]->id;
        $dataRelative = DB::select($query);
        if($dataPersonal[0]->job_type != "SSW"){
            $data = [
                'data' => $dataPersonal[0],
                'certificate' => $dataCertificate[0],
                'prometric' => $dataPrometric,
                'language' => $dataLanguage,
                'educational' => $dataEducational[0],
                'vocational' => $dataVocational,
                'local' => $dataLocal,
                'abroad' => $dataAbroad,
                'family' => $dataFamily[0],
                'japanvisit' => $dataVisit,
                'siblings' => $dataSiblings,
                'children' => $dataChildren,
                'relative' => $dataRelative
            ];
        }
        else{
            $data = [
                'data' => $dataPersonal[0],
                'educational' => $dataEducational[0],
                'vocational' => $dataVocational,
                'local' => $dataLocal,
                'abroad' => $dataAbroad,
                'family' => $dataFamily[0],
                'japanvisit' => $dataVisit,
                'siblings' => $dataSiblings,
                'children' => $dataChildren,
                'relative' => $dataRelative
            ];
        }
        
        $pdf = Pdf::loadView('exportbiodata', $data);
        return $pdf->download("biodata".$date.'.pdf');
     }
}