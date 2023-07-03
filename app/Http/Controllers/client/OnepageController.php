<?php

namespace App\Http\Controllers\client;

use Carbon\Carbon;
use App\Models\post;
use App\Models\image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OnepageController extends Controller
{
    public function view(){
        $posts = post::select()->where("isdeleted",0)->orderby('id','desc')->limit(3)->get();
                $data = $posts->map(function($post,$key){
                    return [
                        "id" => $post->id,
                        "title" => $post->title,
                        "content" => $post->content,
                        "category" => $post->category,
                        "date" => date('m/d/Y' ,strtotime($post->created_at)),
                        "time" => Carbon::parse($post->created_at)->format('g:i a'),
                        "images" => image::select('path')->where("post_id",$post->id)->limit(1)->get()->toArray()
                    ];
                });

     $departure = [
        "january" => 21,
        "february" => 12,
        "march" => 23,
        "april" => 10,
        "may" => 14,
        "june" => 16,
        "july" => 1,
        "august" => 0,
        "september" => 0,
        "october" => 0,
        "november" => 0,
        "december" => 0,

     ];
     return view('welcome',['data'=>$data, "departure" => $departure]);
    }

    public function contact_form(Request $request){
        $data = [];
       try {
        Mail::send("Mail",array(
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->message
        ),function($message) use ($request){
            $message->from($request->email);
            $message->to('alphyjaypaulin22@gmail.com', 'Admin')->subject($request->subject);
        });

        $data = [
            'success' => true,
            'message' => "Thank you we already receive your message and get back to you sooner"
        ];
       } catch (\Throwable $th) {
        //throw $th;
        $data = [
            'success' => false,
            'message' => $th->getMessage()
        ];
       }
       return response()->json($data);
    }
}
