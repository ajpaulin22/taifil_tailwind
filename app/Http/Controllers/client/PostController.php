<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\image;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function view(){
        try {
            $posts = post::select()->get()->toArray();
            $images = image::select()->get()->toArray();

        $dat = "";
        return view("pages.gallery",["posts" => $posts,"images" => $images]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function create_post(){
        
        return view("pages.create-post",);
    }

    public function create(Request $request){
        try {
        DB::beginTransaction();
        $id = DB::table("posts")->insertGetId([
            "title" => $request->title,
            "content" =>$request->content,
            "category" =>$request->category,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);


        foreach($request->file("pictures") as $picture){
            image::create([
            "post_id" => $id,
            "path" => $picture->store($request->title . date('Y-m-d H:i:s'),"public"),
            ]);
        }
        
         DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        
    }
}
