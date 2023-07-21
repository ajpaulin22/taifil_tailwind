<?php

namespace App\Http\Controllers\client;

use Carbon\Carbon;
use App\Models\post;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OnepageController extends Controller
{


    public function view_1(){
        return view("Mail",array(
            'fullname'=>"ALPhy ",
            'email'=>"alphyjaypaulin@22gmail.com",
            'subject'=>"yeahhhhh sample lang",
            'content'=>"sana mapansin po ako dito"
        ));
    }

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


                $query = DB::select("SELECT m.month,ifnull(d.depart,0) as 'person'
                FROM (
                SELECT 'January' AS
                MONTH
                UNION SELECT 'February' AS
                MONTH
                UNION SELECT 'March' AS
                MONTH
                UNION SELECT 'April' AS
                MONTH
                UNION SELECT 'May' AS
                MONTH
                UNION SELECT 'June' AS
                MONTH
                UNION SELECT 'July' AS
                MONTH
                UNION SELECT 'August' AS
                MONTH
                UNION SELECT 'September' AS
                MONTH
                UNION SELECT 'October' AS
                MONTH
                UNION SELECT 'November' AS
                MONTH
                UNION SELECT 'December' AS
                MONTH
                ) AS m
                left JOIN (Select monthname(abroad_date) as `month`, count(monthname(abroad_date)) as 'depart'
                from personal_datas where to_abroad <> 0 AND year(abroad_date) = year(curdate()) AND isdeleted <> 1
                group by monthname(abroad_date)) as d on m.month = d.month");


                $year = DB::SELECT("SELECT y.Year,ifnull(d.depart,0) as 'person' from(
                    select year(curdate())-1 AS YEAR
                    UNION SELECT year(curdate()) as YEAR
                    UNION SELECT year(curdate())+1 as YEAR
                    ) as y
                    left JOIN (SELECT year(abroad_date) as YEAR,count(year(abroad_date)) as 'depart' from personal_datas
                    where to_abroad <> 0 AND isdeleted <> 1
                    group by year(abroad_date)) as d on y.Year = d.Year");

     return view('welcome',['data'=>$data, "departure" => $query,"year_departure" => $year]);
    }

    public function view_jp(){
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
                
                $query = DB::select("SELECT m.month,ifnull(d.depart,0) as 'person'
                FROM (
                SELECT 'January' AS
                MONTH
                UNION SELECT 'February' AS
                MONTH
                UNION SELECT 'March' AS
                MONTH
                UNION SELECT 'April' AS
                MONTH
                UNION SELECT 'May' AS
                MONTH
                UNION SELECT 'June' AS
                MONTH
                UNION SELECT 'July' AS
                MONTH
                UNION SELECT 'August' AS
                MONTH
                UNION SELECT 'September' AS
                MONTH
                UNION SELECT 'October' AS
                MONTH
                UNION SELECT 'November' AS
                MONTH
                UNION SELECT 'December' AS
                MONTH
                ) AS m
                left JOIN (Select monthname(abroad_date) as `month`, count(monthname(abroad_date)) as 'depart'
                from personal_datas where to_abroad <> 0 AND year(abroad_date) = year(curdate()) AND isdeleted <> 1
                group by monthname(abroad_date)) as d on m.month = d.month");

                foreach($query as $month){
                    switch($month->month){
                        case "January":
                            $month->month = '1月';
                            break;
                        case "February":
                            $month->month = '2月';
                            break;
                        case "March":
                            $month->month = '3月';
                            break;
                        case "April":
                            $month->month = '4月';
                            break;
                        case "May":
                            $month->month = '5月';
                            break;
                        case "June":
                            $month->month = '6月';
                            break;
                        case "July":
                            $month->month = '7月';
                            break;
                        case "August":
                            $month->month = '8月';
                            break;
                        case "September":
                            $month->month = '9月';
                            break;
                        case "October":
                            $month->month = '10月';
                            break;
                        case "November":
                            $month->month = '11月';
                            break;
                        case "December":
                            $month->month = '12月';
                            break;                                                                                                                                                                                                    
                        default:
                            "";
                        break;
                    }
                }

                $year = DB::SELECT("SELECT y.Year,ifnull(d.depart,0) as 'person' from(
                    select year(curdate())-1 AS YEAR
                    UNION SELECT year(curdate()) as YEAR
                    UNION SELECT year(curdate())+1 as YEAR
                    ) as y
                    left JOIN (SELECT year(abroad_date) as YEAR,count(year(abroad_date)) as 'depart' from personal_datas
                    where to_abroad <> 0 AND isdeleted <> 1
                    group by year(abroad_date)) as d on y.Year = d.Year");

     return view('jp.welcome',['data'=>$data, "departure" => $query,"year_departure" => $year]);
    }

    public function contact_form(Request $request){
        $data = [];
        
       try {
        Mail::send('Mail',array(
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->message
        ), function($message) use ($request){
            $message->to('email@taifilmanpower.com.ph')->subject($request->subject);
            $message->from($request->email, $request->fullname);
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
