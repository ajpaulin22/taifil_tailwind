<?php

namespace App\Http\Controllers\MasterMaintenance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserInformationController extends Controller
{
    public function view(){
        return view("/admin/MasterMaintenance/UserInformation");
    }

    public function GetUserData(Request $request){

        $limit = $request->length;
        $start = $request->start;
        $order111 = $request->input('order.0.column');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        
        $order = "id";
        $query_1 = "SELECT 
        ID,
        IF(admin = 1, 'Admin', 'Staff') as Position,
        username as UserName,
        firstname as FirstName,
        lastname as LastName
         FROM users WHERE is_deleted = 0 ";
        $query_1 .= " 
        AND  (
        CAST(id as char(200)) LIKE '%".$search."%'
        OR  username LIKE '%".$search."%'
        OR  firstname LIKE '%".$search."%'
        OR  lastname LIKE '%".$search."%')";
    
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
