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
        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
    
        
        $order = "id";
        // $query_1 = "SELECT 
        // ID,
        // CONCAT(first_name, ' ', middle_name, ' ', last_name) as Name,

        // Code
        //  FROM m_jobcodes WHERE IsDeleted = 0 ";
    
        // $query_1 .= " 
        // AND  (
        // CAST(id as char(200)) LIKE '%".$search."%'
        // OR  Code LIKE '%".$search."%')";
    

        $sql = "call spWarehouse_getPallets()";
        $data = collect(DB::select(DB::raw($sql)))-
        // $query_1 .= " limit ".$limit." offset ".$start;
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