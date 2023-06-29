<?php

namespace App\Http\Controllers\client;


use Carbon\Carbon;
use App\Models\post;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class PostController extends Controller
{
    public function view(Request $request){
        try {
            if(isset($request->cat)){
                $posts = post::select()->where("category",$request->cat)->where("isdeleted",0)->get();
                $data = $posts->map(function($post,$key){
                    return [
                        "id" => $post->id,
                        "title" => $post->title,
                        "content" => $post->content,
                        "category" => $post->category,
                        "date" => date('m/d/Y' ,strtotime($post->created_at)),
                        "time" => Carbon::parse($post->created_at)->format('g:i a'),
                        "images" => image::select()->where("post_id",$post->id)->get()->toArray()
                    ];
                });
            }else{
                $posts = post::select()->where("isdeleted",0)->get();
                $data = $posts->map(function($post,$key){
                    return [
                        "id" => $post->id,
                        "title" => $post->title,
                        "content" => $post->content,
                        "category" => $post->category,
                        "date" => date('m/d/Y' ,strtotime($post->created_at)),
                        "time" => Carbon::parse($post->created_at)->format('g:i a'),
                        "images" => image::select()->where("post_id",$post->id)->get()->toArray()
                    ];
                });
            }

            
        $dat = "";
        return view("pages.gallery",["posts" => $data->toArray()]);
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
            "created_at" => Carbon::now('Asia/Hong_Kong'),
            "updated_at" => Carbon::now('Asia/Hong_Kong')
        ]);

        if($request->hasFile("pictures")){
            foreach($request->file("pictures") as $picture){
                image::create([
                "post_id" => $id,
                "path" => $picture->store($request->title . date('Y-m-d'),"public"),
                ]);
            }
        }
        
        
          
         DB::commit();
         
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect("/client/gallery")->with('message',$th->getMessage());
        }

        return response()->json(["data"=>true]);
    }

    public function post(Request $request){
        try {
            $nextid = (int)$request->id+1;
            $previd = (int)$request->id-1;
            $post = post::select()->where("id",$request->id)->where("isdeleted",0)->get();
            $nextpost = post::select("id")->where("id",$nextid)->where("isdeleted",0)->get()->toArray();
            $prevpost = post::select("id")->where("id",$previd)->where("isdeleted",0)->get()->toArray();
        $data = $post->map(function($post,$key){
            return [
                "id" => $post->id,
                "title" => $post->title,
                "content" => $post->content,
                "category" => $post->category,
                "date" => date('m/d/Y' ,strtotime($post->created_at)),
                "time" => Carbon::parse($post->created_at)->format('g:i a'),
                "images" => image::select()->where("post_id",$post->id)->get()->toArray()
            ];
        });
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view("pages.post",["data"=>$data->toArray(),"next"=>$nextpost,"prev"=>$prevpost]);
    }

    public function delete(Request $request){
        $data = post::find($request->id);
        $data->isdeleted = 1;
        $data->update();
        DB::table("images")->where("post_id",$request->id)->update([
            'isdeleted' => 0
        ]);
        return redirect("/client/gallery")->with("message","The post has been deleted");
    }
}
