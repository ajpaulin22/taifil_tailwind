<?php

namespace App\Http\Controllers\MasterMaintenance;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
        return view("/admin/MasterMaintenance/UserInformation");
    }

    public function GetUserData(Request $request){

        $limit = $request->length;
        $start = $request->start;
        $sorCol = $request['columns'][$request['order.0.column']]['data'];
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
        OR  lastname LIKE '%".$search."%') ORDER BY ". $sorCol . " " . $dir;
    
        $query_1 .= " limit ".$limit." offset ".$start;
        $data = DB::select($query_1);

        $query = "select * from users where is_deleted = 0";
        $totalRows = DB::select($query);
        $json_data = [
            'draw' => intval($request->draw),
            'recordsTotal' => COUNT($totalRows),
            'recordsFiltered' => COUNT($totalRows),
            'data' => $data
        ];
        return json_encode($json_data);
    }

    public function SaveUserData(Request $request){
        $msg = "";
        $msgType = "success";
        $msgTitle = "Success!";
        $success = true;
        $encryptedPassword = bcrypt($request['data'][5]["value"]);
        if($request["UserID"] == 0){
            if (DB::table("users")->where('username', $request["data"][3]["value"])->where('is_deleted', 0)->select()->count() != 0){
                $msg = 'Username already exists';
                $msgType = "error";
                $msgTitle = "Error!";
                $success = false;
            }
            else if (DB::table("users")->where('email', $request["data"][4]["value"])->where('is_deleted', 0)->select()->count() != 0){
                $msg = 'Email already exists';
                $msgType = "error";
                $msgTitle = "Error!";
                $success = false;
            }
            else if (DB::table("users")->where('username', $request["data"][3]["value"])->where('is_deleted', 1)->select()->count() != 0){
                DB::table('users')
                    ->where('username', $request["data"][3]["value"])
                    ->update([
                        'firstname' => $request["data"][1]["value"]
                        ,'lastname' => $request["data"][2]["value"]
                        ,'username' => $request["data"][3]["value"]
                        ,'email' => $request["data"][4]["value"]
                        ,'password' => $encryptedPassword
                        ,'create_user' => 'admin'
                        ,'update_user' => 'admin'
                        ,'is_deleted' => 0
                    ]);
                    $msg =  'User Information Saved Successfully';
            }
            else{
                User::create([
                    'firstname' => $request["data"][1]["value"]
                    ,'lastname' => $request["data"][2]["value"]
                    ,'username' => $request["data"][3]["value"]
                    ,'email' => $request["data"][4]["value"]
                    ,'password' => $encryptedPassword
                    ,'is_deleted' => 0
                    ,'create_user' => 'admin'
                    ,'update_user' => 'admin'
                ]);
                $msg = "User Information Saved Successfully";
            }
        }
        else{
            if (DB::table("users")->where('username', $request["data"][3]["value"])->where('is_deleted', 0)->where('id', '!=', $request["UserID"])->select()->count() != 0){
                $msg = 'Username already exists';
                $msgType = "error";
                $msgTitle = "Error!";
                $success = false;
            }
            else if (DB::table("users")->where('email', $request["data"][4]["value"])->where('is_deleted', 0)->where('id', '!=', $request["UserID"])->select()->count() != 0){
                $msg = 'Email already exists';
                $msgType = "error";
                $msgTitle = "Error!";
                $success = false;
            }
            else{

                DB::table('users')
                ->where('id', $request["UserID"])
                ->update($request['data'][5]["value"] == null ?
                 [
                    'firstname' => $request["data"][1]["value"]
                    ,'lastname' => $request["data"][2]["value"]
                    ,'username' => $request["data"][3]["value"]
                    ,'email' => $request["data"][4]["value"]
                    ,'create_user' => 'admin'
                    ,'update_user' => 'admin'
                ]:
                [
                    'firstname' => $request["data"][1]["value"]
                    ,'lastname' => $request["data"][2]["value"]
                    ,'username' => $request["data"][3]["value"]
                    ,'email' => $request["data"][4]["value"]
                    , 'password' => $encryptedPassword
                    ,'create_user' => 'admin'
                    ,'update_user' => 'admin'
                ]
                );
                $msg = 'User Information Updated Successfully';
            }
        }
        $data = [
            'msg' =>  $msg,
            'data' => [],
            'success' => $success,
            'msgType' => $msgType,
            'msgTitle' => $msgTitle
        ];
        return response()->json($data);
    }

    public function GetUserInformation(Request $request){
        $data = DB::table("users")->where('id', $request["UserID"])->select()->get();
        return response()->json($data);
    }

    public function DeleteUser(Request $request){
        $IDs = [];
        for ($i = 0; $i < count($request["ID"]); $i++){
            array_push($IDs,$request["ID"][$i]["ID"]);

        }

        DB::table('users')
            ->whereIN('ID', $IDs)
            ->update(['is_deleted' => 1]);

            $data = [
                'msg' =>  "User information Deleted Successfully",
                'data' => [],
                'success' => true,
                'msgType' => 'success',
                'msgTitle' => 'Success!'
            ];
            return response()->json($data);
    }
}