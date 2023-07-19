<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\qualification_content;

class QualificationController extends Controller
{
    public function view(Request $request){
        $qualification = qualification_content::where("type",$request->data)->select()->get();
        $content = isset($qualification[0]->content)? $qualification[0]->content : "" ;
        $content_id = isset($qualification[0]->id)? $qualification[0]->id : "";
        return view('pages.qualification',["id"=>$request->data,"content"=>$content,"content_id"=>$content_id]);
    }

    public function view_jp(Request $request){
        $qualification = qualification_content::where("type",$request->data)->select()->get();
        $content = isset($qualification[0]->content)? $qualification[0]->content : "" ;
        $content_id = isset($qualification[0]->id)? $qualification[0]->id : "";
        return view('jp.pages.qualification',["id"=>$request->data,"content"=>$content,"content_id"=>$content_id]);
    }

    public function post_qualification(Request $request){
        // qualification_content::created();
        $send = [
            "success" => false,
            "message" => "failed to initialized",
            "messageTitle" => "ERROR"
        ];
       try {
        if($request->id != null){
            qualification_content::where("id",$request->id)->update([
                "content" => $request->content,
            ]);
        }else{
            qualification_content::create([
                "content" => $request->content,
                "type" => $request->type,
            ]);
        }
        $send = [
            "success" => true,
            "message" => "The Qualification has changed",
            "messageTitle" => "Sucess"
        ];
       } catch (\Throwable $th) {
        $send = [
            "success" => false,
            "message" => $th->getMessage(),
            "messageTitle" => "ERROR"
        ];
       }

       return response()->json($send);
    }

    public function get_data(Request $request){
        $send = [
            "success" => false,
            "message" => "failed to initialized",
            "messageTitle" => "ERROR"
        ];

        try {
           $data = qualification_content::where("id",(int)$request->ID)->select()->get()->toArray();
           if(count($data) != 0){
            $send = [
                "success" => true,
                "data" => $data,
                "message" => "Successfully Generated",
                "messageTitle" => "Success"
            ];
           }else{
            $send = [
                "success" => false,
                "message" => "empty data",
                "messageTitle" => "empty"
            ];
           }
        } catch (\Throwable $th) {
            $send = [
                "success" => false,
                "message" => $th->getMessage(),
                "messageTitle" => "ERROR"
            ];
        }

        return response()->json($send);
    }
}
