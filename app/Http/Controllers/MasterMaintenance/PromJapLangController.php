<?php

namespace App\Http\Controllers\MasterMaintenance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\japlangs;
use App\Models\prometrics;
use Yajra\DataTables\Facades\DataTables;

class PromJapLangController extends Controller
{
   public function view(){
      return view('admin.MasterMaintenance.PromJapLang');
   }

   public function GetPrometrics(Request $request){
      
      $data = DB::table("prometrics")->select("id", "prometric")->where("isdeleted",0);
      return Datatables::of($data)->make(true);
   }

   public function GetJaplang(){
      $data = DB::table("japlangs")->select("id", "jap_lang")->where("isdeleted",0);
      return Datatables::of($data)->make(true);
   }

   public function SavePrometrics(Request $request){
      try{
         $validated = $request->validate([
            'prometric' => 'required|unique:prometrics,prometric,'. $request["ID"] .',id,isdeleted,0'
         ]);
         $user = auth()->user();
         $validated["IsDeleted"] = 0;
         $validated["CreateID"] = $user->username;
         $validated["UpdateID"] = $user->username;
         if($request->ID == 0){
            prometrics::create($validated);
            $msg = 'Prometric Saved Successfully';
         }
         else{
            DB::table('prometrics')
               ->where('id', $request["ID"])
               ->update(['prometric' => $request["prometric"]
                        ,'UpdateID' => $user->username
                        ]);
               $msg = 'Prometric Saved Successfully';
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
      catch(\Throwable $th){
         $data = [
            'msg' =>  'Prometric Already Exists',
            'data' => [],
            'success' => false,
            'msgType' => 'error',
            'msgTitle' => 'Error!'
        ];
        return response()->json($data);
      }
   }

   public function SaveJaplang(Request $request){
      try{
         $validated = $request->validate([
            'jap_lang' => 'required|unique:japlangs,jap_lang,'. $request["ID"] .',id,isdeleted,0'
         ]);
         $user = auth()->user();
         $validated["IsDeleted"] = 0;
         $validated["CreateID"] = $user->username;
         $validated["UpdateID"] = $user->username;
         if($request->id == 0){
            japlangs::create($validated);
            $msg = 'Japanese Language Saved Successfully';
         }
         else{
            DB::table('japlangs')
               ->where('id', $request["ID"])
               ->update(['jap_lang' => $request["jap_lang"]
                        ,'UpdateID' => $user->username
                     ]);
               $msg = 'Japanese Language Updated Successfully';
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
      catch(\Throwable $th){
         $data = [
            'msg' =>  'Japanese Language Already Exists',
            'data' => [],
            'success' => false,
            'msgType' => 'error',
            'msgTitle' => 'Error!'
        ];
        return response()->json($data);
      }
   }
}
